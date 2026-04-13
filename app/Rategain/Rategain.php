<?php

namespace App\Rategain;

use App\BambooInstance;
use App\Crypt\Crypt;
use App\Models\Carghab;
use App\Models\Dathot;
use App\Models\Folio;
use App\Models\Habitacion;
use App\Models\Plares;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\CrBooker;
use App\Models\CrBookerReserva;
use App\Models\CrGuarantee;
use App\Models\ReservaNuevo;
use App\Models\Tarcre;
use App\Models\Tipcanre;
use App\Models\Tipdoc;
use App\Models\Tipre;
use App\Models\CrChannel;
use App\Models\Valmon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Rategain
{
    public $reservationResponseSuccess;
    public $reservationResponseError;
    public $inventoryModifyRequest;
    public $inventoryModifyRequestItem;
    public $uit;
    public $aqc;
    public $originalReservation;

    public function __construct()
    {
        $this->originalReservation = null;
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        $this->initializeUisAndAqc();
        $this->initializeXmlTemplates($currentDate, $currentTime);
    }

    private function initializeUisAndAqc()
    {
        $this->uit = [
            '1' => 'Customer', '2' => 'CRO (Customer Reservations Office)', '3' => 'Corporation representative',
            '4' => 'Company', '5' => 'Travel agency', '6' => 'Airline', '7' => 'Wholesaler', '8' => 'Car rental',
            '9' => 'Group', '10' => 'Hotel', '11' => 'Tour operator', '12' => 'Cruise line', '13' => 'Internet broker',
            '14' => 'Reservation', '15' => 'Cancellation', '16' => 'Reference', '17' => 'Meeting planning agency',
            '18' => 'Other', '19' => 'Insurance agency', '20' => 'Insurance agent', '21' => 'Profile',
            '22' => 'ERSP (Electronic reservation service provider)', '23' => 'Provisional reservation',
            '24' => 'Travel Agent PNR', '25' => 'Associated reservation', '26' => 'Associated itinerary reservation',
            '27' => 'Associated shared reservation', '28' => 'Alliance', '29' => 'Booking agent', '30' => 'Ticket',
            '31' => 'Divided reservation', '32' => 'Merchant', '33' => 'Acquirer', '34' => 'Master reference',
            '35' => 'Purged master reference', '36' => 'Parent reference', '37' => 'Child reference',
            '38' => 'Linked reference', '39' => 'Contract', '40' => 'Confirmation number', '41' => 'Fare quote',
            '42' => 'Reissue/refund quote', '43' => 'Ground transportation supplier', '44' => 'EMD',
        ];

        $this->aqc = [
            '1' => 'Over 21', '2' => 'Over 65', '3' => 'Under 2', '4' => 'Under 12', '5' => 'Under 17',
            '6' => 'Under 21', '7' => 'Infant', '8' => 'Child', '9' => 'Teenager', '10' => 'Adult',
            '11' => 'Senior', '12' => 'Additional occupant with adult', '13' => 'Additional occupant without adult',
            '14' => 'Free child', '15' => 'Free adult', '16' => 'Young driver', '17' => 'Younger driver',
            '18' => 'Under 10', '19' => 'Junior',
        ];
    }

    private function initializeXmlTemplates($currentDate, $currentTime)
    {
        $this->reservationResponseSuccess = <<<XML
<OTA_HotelResNotifRS TimeStamp="{$currentDate}T{$currentTime}">
    <HotelReservations>
        <HotelReservation>
            <ResGlobalInfo>
                <HotelReservationIDs>
                    <HotelReservationID ResID_Type="3" ResID_Value="123456789" />
                    <HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>
                </HotelReservationIDs>
            </ResGlobalInfo>
        </HotelReservation>
    </HotelReservations>
    <Success />
</OTA_HotelResNotifRS>
XML;
        $this->reservationResponseError = <<<XML
<OTA_HotelResNotifRS TimeStamp="{$currentDate}T{$currentTime}">
    <Errors>
        <Error Code="450" Status="NotProcessed" ShortText="Invalid XML" />
    </Errors>
</OTA_HotelResNotifRS>
XML;

        $this->inventoryModifyRequest = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="{$currentDate}T{$currentTime}" Target="Production" Version="1.002">
        <AvailStatusMessages HotelCode="xxxxx">
                <AvailStatusMessage></AvailStatusMessage>
        </AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;

        $this->inventoryModifyRequestItem = <<<XML
<AvailStatusMessage BookingLimit="1" BookingLimitMessageType="SetLimit">
    <StatusApplicationControl Start="2020-03-01" End="2020-03-01" InvCode="SGL"></StatusApplicationControl>
    <UniqueID Type="16" ID="1"></UniqueID>
</AvailStatusMessage>
XML;
    }

    private function getString($value)
    {
        if (is_object($value)) {
            if (isset($value->{'0'})) return (string)$value->{'0'};
            return '';
        }
        return (string)$value;
    }

    private function ensureArray($element)
    {
        if (!isset($element)) return [];
        return is_array($element) ? $element : [$element];
    }

    public function modifyInventory($startDate = null, $endDate = null, $roomId = null, $hotelId = null, $quantity = null)
    {
        $hotelId = $hotelId ?: config('rategain.hotelCode');
        $sDate = $startDate ?: date('Y-m-d');
        $eDate = $endDate ?: date('Y-m-d');
        
        $begin = new \DateTime($sDate);
        $end = (new \DateTime($eDate))->modify('+1 day');
        $daterange = new \DatePeriod($begin, new \DateInterval('P1D'), $end);

        $xmlItems = '';
        foreach ($daterange as $dt) {
            $date = $dt->format("Y-m-d");
            $thisXmlItem = $this->inventoryModifyRequestItem;
            $thisXmlItem = str_replace(['BookingLimit="1"', 'Start="2020-03-01"', 'End="2020-03-01"', 'InvCode="SGL"', 'ID="1"'],
                                       ['BookingLimit="' . $quantity . '"', 'Start="' . $date . '"', 'End="' . $date . '"', 'InvCode="' . $roomId . '"', 'ID="' . $this->uniqidReal() . '"'],
                                       $thisXmlItem);
            $xmlItems .= "\n" . $thisXmlItem;
        }

        $thisXml = str_replace(['HotelCode="xxxxx"', '<AvailStatusMessage></AvailStatusMessage>'],
                               ['HotelCode="' . $hotelId . '"', $xmlItems . "\n"],
                               $this->inventoryModifyRequest);

        return [['updated' => 'OK', 'xml' => $this->sendCurlRequest($thisXml)]];
    }

    private function sendCurlRequest($xml)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERPWD, config('rategain.username') . ":" . config('rategain.password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_URL, config('rategain.url'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function sendAvailability($feclle, $fecsal, $codcla, $codrg, $instance)
    {
        $dailyAvailability = $this->getDailyAvailability($feclle, $fecsal, $codcla);
        $xmlItems = '';
        foreach ($dailyAvailability as $date => $count) {
            $thisXmlItem = $this->inventoryModifyRequestItem;
            $thisXmlItem = str_replace(['BookingLimit="1"', 'Start="2020-03-01"', 'End="2020-03-01"', 'InvCode="SGL"'],
                                       ['BookingLimit="' . $count . '"', 'Start="' . $date . '"', 'End="' . $date . '"', 'InvCode="' . $codrg . '"'],
                                       $thisXmlItem);
            $xmlItems .= "\n" . $thisXmlItem;
        }

        $thisXml = str_replace(['HotelCode="xxxxx"', '<AvailStatusMessage></AvailStatusMessage>'],
                               ['HotelCode="' . $instance . '"', $xmlItems . "\n"],
                               $this->inventoryModifyRequest);

        return $this->sendCurlRequest($thisXml);
    }

    public function getAvailableRooms($start, $end, $roomClass = null)
    {
        $occupied = $this->getOccupiedRooms($start, $end, $roomClass);
        $query = "SELECT * FROM habitacion WHERE tipo = 'V'";
        $bindings = [];

        if ($roomClass) {
            $query .= " AND codcla = ?";
            $bindings[] = $roomClass;
        }

        if (!empty($occupied)) {
            $placeholders = implode(',', array_fill(0, count($occupied), '?'));
            $query .= " AND numhab NOT IN ($placeholders)";
            $bindings = array_merge($bindings, $occupied);
        }

        return collect(DB::connection('on_the_fly')->select($query, $bindings));
    }

    private function getOccupiedRooms($start, $end, $roomClass = null)
    {
        $occupied = [];
        $params = [$end, $start];
        $clause = $roomClass ? "AND habitacion.codcla = ?" : "";
        if ($roomClass) $params[] = $roomClass;

        $qBlocked = "SELECT blohab.numhab FROM blohab INNER JOIN habitacion ON blohab.numhab = habitacion.numhab WHERE blohab.fecini <= ? AND blohab.fecfin >= ? AND blohab.fecdes IS NULL AND habitacion.tipo = 'V' $clause";
        $qReserva = "SELECT reserva.numhab FROM reserva INNER JOIN habitacion ON reserva.numhab = habitacion.numhab WHERE reserva.feclle < ? AND reserva.fecsal > ? AND reserva.estado IN ('P','G') AND habitacion.tipo = 'V' $clause";
        $qFolio = "SELECT folio.numhab FROM folio INNER JOIN habitacion ON folio.numhab = habitacion.numhab WHERE folio.feclle < ? AND folio.fecsal > ? AND folio.estado IN ('I') AND habitacion.tipo = 'V' $clause";

        foreach ([$qBlocked, $qReserva, $qFolio] as $query) {
            foreach (DB::connection('on_the_fly')->select($query, $params) as $row) $occupied[] = $row->numhab;
        }

        return array_unique($occupied);
    }

    public function getDailyAvailability($start, $end, $codcla)
    {
        $allRooms = DB::connection('on_the_fly')->select("SELECT numhab FROM habitacion WHERE tipo = 'V' AND codcla = ?", [$codcla]);
        $totalRooms = count($allRooms);
        $params = [$end, $start, $codcla];
        
        $occ = [
            'b' => DB::connection('on_the_fly')->select("SELECT blohab.numhab, fecini, fecfin FROM blohab INNER JOIN habitacion ON blohab.numhab = habitacion.numhab WHERE fecini <= ? AND fecfin >= ? AND fecdes IS NULL AND habitacion.codcla = ?", $params),
            'r' => DB::connection('on_the_fly')->select("SELECT reserva.numhab, feclle, fecsal FROM reserva INNER JOIN habitacion ON reserva.numhab = habitacion.numhab WHERE feclle < ? AND fecsal > ? AND reserva.estado IN ('P','G') AND codcla = ?", $params),
            'f' => DB::connection('on_the_fly')->select("SELECT folio.numhab, feclle, fecsal FROM folio INNER JOIN habitacion ON folio.numhab = habitacion.numhab WHERE feclle < ? AND fecsal > ? AND folio.estado IN ('I') AND codcla = ?", $params)
        ];

        $result = [];
        $period = new \DatePeriod(new \DateTime($start), new \DateInterval('P1D'), new \DateTime($end));
        foreach ($period as $dt) {
            $d = $dt->format('Y-m-d'); $de = date('Y-m-d', strtotime($d . ' +1 day'));
            $rooms = [];
            foreach ($occ['b'] as $x) if ($d <= $x->fecfin && $de >= $x->fecini) $rooms[$x->numhab] = 1;
            foreach ($occ['r'] as $x) if ($d < $x->fecsal && $de > $x->feclle) $rooms[$x->numhab] = 1;
            foreach ($occ['f'] as $x) if ($d < $x->fecsal && $de > $x->feclle) $rooms[$x->numhab] = 1;
            $result[$d] = max(0, $totalRooms - count($rooms));
        }
        return $result;
    }

    public function saveReservation($data, $confirmationid = null, $update = false)
    {
        try {
            DB::connection('on_the_fly')->beginTransaction();
            $hotelRes = $data->HotelReservations->HotelReservation;
            $hotelRes->RoomStays->RoomStay = $this->ensureArray($hotelRes->RoomStays->RoomStay);
            $hotelRes->ResGuests->ResGuest = $this->ensureArray($hotelRes->ResGuests->ResGuest);

            $uniqueIdVal = $this->extractUniqueId($hotelRes);
            $resStatus = isset($data->ResStatus) ? $this->getString($data->ResStatus) : (isset($hotelRes->ResStatus) ? $this->getString($hotelRes->ResStatus) : '');

            if ($resStatus == 'Commit' && $this->reservationAlreadyExists($uniqueIdVal)) {
                DB::connection('on_the_fly')->rollBack();
                return $this->getReservationError(['exists']);
            }

            $channelConfig = $this->getChannelConfig($data);
            $guestAndBooker = $this->processGuestAndBookerData($data);
            if ($update) $this->handleUpdatePreparation($data);

            $allocation = $this->allocateRooms($data, $update);
            if (isset($allocation['error'])) {
                DB::connection('on_the_fly')->rollBack();
                return $allocation['error'];
            }

            $staticData = $this->getStaticData();
            $confirmationid = $confirmationid ?: $this->uniqidReal(16);

            $createdReservation = null;
            foreach ($hotelRes->RoomStays->RoomStay as $idx => $roomStay) {
                $reservaData = $this->prepareReservationData($data, $roomStay, $allocation['selectedRooms'][$idx], $guestAndBooker, $channelConfig, $staticData, $confirmationid, $update);
                
                if (!$update) {
                    $createdReservation = Reserva::create($reservaData);
                    ReservaNuevo::create($reservaData);
                } else if ($this->originalReservation) {
                    $this->originalReservation->update($reservaData);
                    $createdReservation = $this->originalReservation;
                }

                if ($createdReservation) {
                    $this->handlePlares($createdReservation->numres, $roomStay, $staticData['usd'], $update);
                    $this->handleGuaranteesAndBookerRecords($data, $createdReservation->numres, $guestAndBooker['booker'], $update);
                    if (!$update) $this->handleFolioAndCarghab($data, $roomStay, $createdReservation->numres, $reservaData, $channelConfig, $allocation['selectedRooms'][$idx]->numhab);
                    $this->handleTarcre($data, $createdReservation->numres, $guestAndBooker['booker'], $update);
                }
            }

            DB::connection('on_the_fly')->commit();
            if ($createdReservation) $this->dispatchAvailabilityUpdate($createdReservation, $data);
            return $this->buildSuccessResponse($data, $confirmationid);

        } catch (\Exception $e) {
            DB::connection('on_the_fly')->rollBack();
            file_put_contents(storage_path('logs/rategain_error.log'), "[" . date('Y-m-d H:i:s') . "] Save Error: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n", FILE_APPEND);
            return $this->getReservationError(['general_error']);
        }
    }

    private function extractUniqueId($hotelRes)
    {
        $id13 = $this->getIdByType($hotelRes, '13');
        if (!empty($id13)) return $id13;

        $id16 = $this->getIdByType($hotelRes, '16');
        if (!empty($id16)) return $id16;

        if (isset($hotelRes->ResGlobalInfo->HotelReservationIDs->HotelReservationID)) {
            foreach ($this->ensureArray($hotelRes->ResGlobalInfo->HotelReservationIDs->HotelReservationID) as $id) {
                $val = $this->getString($id->ResID_Value);
                if (!empty($val)) return $val;
            }
        }
        return isset($hotelRes->UniqueID->ID) ? $this->getString($hotelRes->UniqueID->ID) : '';
    }

    private function getIdByType($hotelRes, $type)
    {
        if (isset($hotelRes->ResGlobalInfo->HotelReservationIDs->HotelReservationID)) {
            foreach ($this->ensureArray($hotelRes->ResGlobalInfo->HotelReservationIDs->HotelReservationID) as $id) {
                if ($this->getString($id->ResID_Type) == $type) {
                    return $this->getString($id->ResID_Value);
                }
            }
        }
        return '';
    }

    private function reservationAlreadyExists($id)
    {
        return !empty($id) && Reserva::where('referencia', 'LIKE', '%' . $id . '%')->whereIn('reserva.estado', ['P', 'G', 'H'])->exists();
    }

    private function getChannelConfig($data)
    {
        $code = isset($data->POS->Source->BookingChannel->CompanyName->Code) ? $this->getString($data->POS->Source->BookingChannel->CompanyName->Code) : 'defecto';
        return CrChannel::with('empresa')->where('channel_code', $code)->first() ?: CrChannel::with('empresa')->where('channel_code', 'defecto')->first();
    }

    private function processGuestAndBookerData($data)
    {
        $resGuest = null; $booker = null; $guestExits = null; $company = null;
        foreach ($data->HotelReservations->HotelReservation->ResGuests->ResGuest as $guest) {
            foreach ($this->ensureArray($guest->Profiles->ProfileInfo) as $pInfo) {
                $p = $pInfo->Profile; $type = (int)$p->ProfileType;
                if ($type === 1) {
                    if (!$resGuest || (isset($guest->PrimaryIndicator) && $this->getString($guest->PrimaryIndicator) == 'true')) $resGuest = $p->Customer;
                    $email = isset($p->Customer->Email) ? $this->getString($p->Customer->Email) : null;
                    if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $guestExits = Cliente::where('email', $email)->first() ?: Cliente::create($this->prepareClientData($p->Customer));
                    }
                } elseif ($type === 18) {
                    $email = isset($p->Customer->Email) ? $this->getString($p->Customer->Email) : null;
                    $booker = ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) ? (CrBooker::where('email', $email)->first() ?: CrBooker::create($this->prepareBookerData($p->Customer))) : (object)$this->prepareBookerData($p->Customer);
                } elseif ($type === 3) {
                    $company = ['id' => isset($pInfo->UniqueID->ID) ? $this->getString($pInfo->UniqueID->ID) : null, 'name' => $this->getString($p->CompanyInfo->CompanyName)];
                }
            }
        }
        return ['resGuest' => $resGuest, 'booker' => $booker, 'guestExits' => $guestExits, 'company' => $company];
    }

    private function prepareClientData($c)
    {
        $email = isset($c->Email) ? $this->getString($c->Email) : '';
        return ['cedula' => rand(99999999, 999999999), 'tipdoc' => 3, 'nombre' => $this->getString($c->PersonName->GivenName) . ' ' . $this->getString($c->PersonName->Surname), 'telefono1' => '123456', 'email' => $email, 'primer_nombre' => $this->getString($c->PersonName->GivenName), 'primer_apellido' => $this->getString($c->PersonName->Surname), 'emailfe' => $email, 'locnac' => 15, 'ciudades_dian' => 1181, 'credito' => 'N', 'tipcre' => 'T'];
    }

    private function prepareBookerData($c)
    {
        return ['givenname' => $this->getString($c->PersonName->GivenName), 'surname' => $this->getString($c->PersonName->Surname), 'email' => isset($c->Email) ? $this->getString($c->Email) : '', 'address' => isset($c->Address->AddressLine) ? json_encode($c->Address->AddressLine) : ''];
    }

    private function handleUpdatePreparation($data)
    {
        $id = $this->extractUniqueId($data->HotelReservations->HotelReservation);
        $this->originalReservation = Reserva::where('referencia', 'LIKE', '%' . $id . '%')->whereIn('reserva.estado', ['P', 'G', 'H'])->orderBy('fecres', 'desc')->first();
        if ($this->originalReservation) $this->originalReservation->update(['estado' => 'C']);
    }

    private function allocateRooms($data, $update)
    {
        $used = []; $selected = []; $hotelRes = $data->HotelReservations->HotelReservation;
        $all = $this->getAvailableRooms($hotelRes->ResGlobalInfo->TimeSpan->Start, $hotelRes->ResGlobalInfo->TimeSpan->End);

        foreach ($hotelRes->RoomStays->RoomStay as $rs) {
            $code = strtoupper($this->getString($rs->RoomRates->RoomRate->RoomTypeCode));
            $mapping = config('rategain.rooms_cl'); $roomClass = null;
            if ($mapping) foreach ($mapping as $rg_code => $bb_id) if (strtoupper($rg_code) === $code) { $roomClass = $bb_id; break; }

            $candidates = $all->where('codcla', $roomClass)->whereNotIn('numhab', $used);
            $sel = ($update && $this->originalReservation) ? $candidates->where('numhab', $this->originalReservation->numhab)->first() : null;
            if (!$sel) $sel = $candidates->first();

            if ($sel) { $selected[] = $sel; $used[] = $sel->numhab; } 
            else return ['error' => $this->getReservationError(['noAvailabilities'])];
        }
        return ['selectedRooms' => $selected];
    }

    private function getStaticData()
    {
        return [
            'dathot' => collect(DB::connection('on_the_fly')->select("select nit, numrec from dathot;"))->first(),
            'usd' => Valmon::orderBy('fecha', 'DESC')->first(),
            'numres' => collect(DB::connection('on_the_fly')->select('select MAX(numres) as res from reserva'))->first()->res ?: 0,
            'numfol' => collect(DB::connection('on_the_fly')->select("select MAX(numfol) as fol from folio"))->first()->fol ?: 0,
        ];
    }

    private function prepareReservationData($data, $rs, $selRoom, $gb, $conf, $static, $cid, $update)
    {
        $hr = $data->HotelReservations->HotelReservation;
        $total = isset($hr->ResGlobalInfo->Total->AmountBeforeTax) ? $hr->ResGlobalInfo->Total->AmountBeforeTax : $hr->ResGlobalInfo->Total->AmountAfterTax;
        if (isset($hr->ResGlobalInfo->Total->CurrencyCode) && $this->getString($hr->ResGlobalInfo->Total->CurrencyCode) === 'USD') $total *= $static['usd']->valor;

        $given = $gb['resGuest'] ? $this->getString($gb['resGuest']->PersonName->GivenName) : 'Huesped';
        $surname = $gb['resGuest'] ? $this->getString($gb['resGuest']->PersonName->Surname) : 'Anonimo';
        
        // Extraer ID tipo 13 específicamente para concatenar
        $id13 = $this->getIdByType($hr, '13');
        if (empty($id13)) $id13 = $this->extractUniqueId($hr);

        $resData = [
            'numres' => $update ? $this->originalReservation->numres : $static['numres'] + 1,
            'referencia' => $given . ' ' . $surname . ' - ' . $id13, // Concatenación solicitada
            'tipdoc' => $gb['guestExits'] ? $gb['guestExits']->tipdoc : 1, 'nit' => $conf->NIT ?: 0, 'numhab' => $selRoom->numhab,
            'tipres' => $conf->tipres, 'tipseg' => $conf->tipseg ?: 'I', 'fecres' => date('Y-m-d'),
            'feclle' => $hr->ResGlobalInfo->TimeSpan->Start, 'fecsal' => $hr->ResGlobalInfo->TimeSpan->End, 'hora' => '15:00',
            'estado' => isset($hr->ResGlobalInfo->Guarantee) ? 'G' : 'P', 'metadata' => json_encode($data), 'confirmationid' => $cid,
            'totest' => $total, 'email' => ($gb['resGuest'] && isset($gb['resGuest']->Email)) ? $this->getString($gb['resGuest']->Email) : ''
        ];
        if ($update) $resData['modifyid'] = $cid;
        return $resData;
    }

    private function handlePlares($numres, $rs, $usd, $update)
    {
        if ($update) Plares::where('numres', $numres)->delete();
        $batch = []; $cnt = 1;
        foreach ($this->ensureArray($rs->RoomRates->RoomRate->Rates->Rate) as $r) {
            $amt = isset($r->Base->AmountBeforeTax) ? $r->Base->AmountBeforeTax : $r->Base->AmountAfterTax;
            if (isset($r->Base->CurrencyCode) && $this->getString($r->Base->CurrencyCode) === 'USD') $amt *= $usd->valor;
            $batch[] = ['numres' => $numres, 'numpla' => $cnt++, 'codpla' => config('rategain.codpla'), 'fecini' => $r->EffectiveDate, 'fecfin' => $r->ExpireDate, 'pordes' => 0, 'tipdes' => 'P', 'valornoche' => $amt, 'codigocr' => $this->getString($rs->RoomRates->RoomRate->RatePlanCode)];
        }
        Plares::insert($batch);
    }

    private function handleGuaranteesAndBookerRecords($data, $numres, $booker, $update)
    {
        if ($update) return;
        if ($booker && isset($booker->id)) CrBookerReserva::create(['booker_id' => $booker->id, 'numres' => $numres, 'amount' => 0, 'date' => date('Y-m-d H:i:s'), 'booker_name' => $booker->givenname]);
    }

    private function handleFolioAndCarghab($data, $rs, $numres, $reservaData, $conf, $numhab)
    {
        $numfol = collect(DB::connection('on_the_fly')->select("select MAX(numfol)+1 as fol from folio"))->first()->fol ?: 1;
        Folio::create(['numfol' => $numfol, 'numres' => $numres, 'tipdoc' => $reservaData['tipdoc'], 'cedula' => 0, 'nit' => $reservaData['nit'], 'numhab' => $numhab, 'fecres' => date('Y-m-d'), 'feclle' => $reservaData['feclle'], 'fecsal' => $reservaData['fecsal'], 'estado' => 'O', 'tippro' => $conf->tippro ?: 1, 'codven' => $conf->codven ?: 1]);
        Carghab::create(['numfol' => $numfol, 'numcue' => '1', 'estado' => 'S']);
    }

    private function handleTarcre($data, $numres, $booker, $update)
    {
        $gi = $data->HotelReservations->HotelReservation->ResGlobalInfo;
        $card = isset($gi->Guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard) ? $gi->Guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard : null;
        if ($card && isset($card->CardNumber) && !empty($this->getString($card->CardNumber))) {
            $num = $this->getString($card->CardNumber);
            if ($update) Tarcre::where('numres', $numres)->delete();
             Tarcre::create(['numres' => $numres, 'codusu' => 1, 'fecha' => date('Y-m-d'), 'tipo' => Crypt::validatecard($num), 'numero' => $num, 'numero_mask' => Crypt::getStarred($num), 'nombre' => $this->getString($card->CardHolderName), 'fecven' => '20' . substr($this->getString($card->ExpireDate), -2) . '-' . substr($this->getString($card->ExpireDate), 0, 2) . '-01', 'direccion' => ($booker && isset($booker->address)) ? $booker->address : '']);
        }
    }

    private function dispatchAvailabilityUpdate($res, $data)
    {
        $rs = $this->ensureArray($data->HotelReservations->HotelReservation->RoomStays->RoomStay);
        $code = $this->getString($rs[0]->RoomRates->RoomRate->RoomTypeCode);
        $this->sendAvailability($res->feclle, $res->fecsal, config('rategain.rooms_cl.' . $code), $code, $data->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);
    }

    private function buildSuccessResponse($data, $cid)
    {
        $id = $this->extractUniqueId($data->HotelReservations->HotelReservation);
        return str_replace(['123456789', 'chd23242342'], [$cid, $id], $this->reservationResponseSuccess);
    }

    function uniqidReal($l = 13) { return substr(bin2hex(random_bytes(ceil($l / 2))), 0, $l); }

    public function getReservationError($errs)
    {
        $map = $this->getErrorMappings(); $eStr = "<Errors>";
        foreach ($errs as $e) { $m = isset($map[$e]) ? $map[$e] : ['Code' => 450, 'ShortText' => 'Unknown Error']; $eStr .= "\n\t\t<Error Code=\"{$m['Code']}\" Status=\"NotProcessed\" ShortText=\"{$m['ShortText']}\" />"; }
        return "<OTA_HotelResNotifRS TimeStamp=\"" . date('Y-m-d\TH:i:s') . "\">\n\t{$eStr}\n\t</Errors>\n</OTA_HotelResNotifRS>";
    }

    private function getErrorMappings() { return ['reservation.notFound' => ['Code' => 404, 'ShortText' => 'Not found'], 'noAvailabilities' => ['Code' => 450, 'ShortText' => 'No room availabilities'], 'exists' => ['Code' => 400, 'ShortText' => 'Exists'], 'general_error' => ['Code' => 500, 'ShortText' => 'Error']]; }
}
