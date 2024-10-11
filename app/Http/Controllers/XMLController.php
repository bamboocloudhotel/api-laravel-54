<?php

namespace App\Http\Controllers;

use App\BambooInstance;
use App\Models\Canre;
use App\Models\Motcan;
use App\Rategain\Rategain;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\RategainRequest;

class XMLController extends Controller
{
    //
    protected $rategain;

    public function __construct()
    {
        $this->rategain = new Rategain();
    }

    public function index(Request $request)
    {
        try {
            $xml = trim($request->getContent());
        } catch (\Exception $exception) {
            return response()->xml($exception->getMessage());
        }

        if (!$xml) {
            return response()->xml($this->rategain->reservationResponseError);
        }

        $data = $this->parseRequestXml($xml, true);
        $reservationObject = json_decode(json_encode($data['data']));

        $confirmationid = $this->uniqidReal(16);
        $returnSuccess = $this->rategain->reservationResponseSuccess;

        // $this->setRateGainConfig($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

        try {

            $rategainRequest = RategainRequest::create([
                'reference' => 'Rategain ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
                'type' => $data['data']['ResStatus'],
                'request' => json_encode($reservationObject),
                'xml' => $xml,
                'hotel' => $reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode
            ]);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

        switch ($data['data']['ResStatus']) {
            case 'Commit':

                $validation = $this->doValidation($reservationObject, $data);

                if ($validation->fails()) {
                    $errors = $validation->errors();
                    // dd($errors->toArray());
					$rategainRequest->update([
						'response' => $this->rategain->getReservationError($errors->all()),
						'confirmation_id' => 'FAIL'
					]);
                    return response()->xml($this->rategain->getReservationError($errors->all()));
                }


                $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

				// return response()->json(\Config::get("database.connections.on_the_fly"));
                // dd($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

                $reservation = Reserva::where('referencia', 'LIKE', '%' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '%')
                    ->where('estado', 'G')->first();

                if ($reservation) {
                    return response()->xml($this->rategain->getReservationError(['reservation.exists']));
                }

                $response = $this->rategain->saveReservation($reservationObject, $confirmationid);

                $rategainRequest->update([
                    'response' => $response,
                    'confirmation_id' => $confirmationid
                ]);

                return response()->xml($response);
                break;
            case 'Modify':
                // dd($data);

                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="3" ResID_Value="123456789" />',
                    '<HotelReservationID ResID_Type="3" ResID_Value="' . $confirmationid . '" />',
                    $returnSuccess
                );

                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>',
                    '<HotelReservationID ResID_Type="14" ResID_Value="' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '"/>',
                    $returnSuccess
                );
				
				$validation = $this->doValidation($reservationObject, $data);

                if ($validation->fails()) {
                    $errors = $validation->errors();
                    // dd($errors->toArray());
					$rategainRequest->update([
						'response' => $this->rategain->getReservationError($errors->all()),
						'confirmation_id' => 'FAIL'
					]);
                    return response()->xml($this->rategain->getReservationError($errors->all()));
                }

                $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

                $reserva = Reserva::where('referencia', 'LIKE', '%' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '%')
                    ->where('estado', '<>', 'C')
                    ->with('plares', 'folios')
                    ->orderBy('fecres', 'desd')
                    ->first();

                if (!$reserva) {
                    return response()->xml($this->rategain->getReservationError(['reservation.notFound']));
                } else {
                    $this->rategain->originalReservation = $reserva;
                }

                $response = $this->rategain->saveReservation($reservationObject, $confirmationid, true);

                $rategainRequest->update([
                    'response' => $response,
                    'confirmation_id' => $confirmationid
                ]);

                return response()->xml($response);
                break;
            case 'Cancel':
			
				$validation = $this->doValidation($reservationObject, $data);

                if ($validation->fails()) {
                    $errors = $validation->errors();
                    // dd($errors->toArray());
					$rategainRequest->update([
						'response' => $this->rategain->getReservationError($errors->all()),
						'confirmation_id' => 'FAIL'
					]);
                    return response()->xml($this->rategain->getReservationError($errors->all()));
                }

                // dd('cancellation', $reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

                $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);


                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="3" ResID_Value="123456789" />',
                    '<HotelReservationID ResID_Type="3" ResID_Value="' . $confirmationid . '" />',
                    $returnSuccess
                );
                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>',
                    '<HotelReservationID ResID_Type="14" ResID_Value="' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '"/>',
                    $returnSuccess
                );

                $reserva = Reserva::where('referencia', 'LIKE', '%' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '%')->get();

                // dd($reserva->toArray());

                if (!$reserva || !count($reserva)) {
                    return response()->xml($returnSuccess);
                }

                foreach ($reserva as $res) {

                    $lastCancellation = Canre::orderBy('codcan', 'desc')->first()->toArray();
                    // dd($lastCancellation);
                    $lastCancellationId = $lastCancellation['codcan'] + 1;

                    $motcan = Motcan::where('detalle', 'INTEGRACIÓN CANCELACIÓN')->first();

                    if (!$motcan) {
                        $motcanNext = Motcan::orderBy('motcan', 'desc')->first();
                        $motcanId = ($motcanNext->motcan + 1);
                        $motcan = Motcan::create([
                            'motcan' => $motcanId,
                            'detalle' => 'INTEGRACIÓN CANCELACIÓN'
                        ]);
                    }

                    try {
                        Canre::create([
                            'codcan' => $lastCancellationId,
                            'numres' => $res->numres,
                            'feccan' => date('Y-m-d'),
                            'hora' => date('H:i'),
                            'descripcion' => 'Reserva cancelada por la integración Rategain',
                            'solicitada' => 'Integración Rategain',
                            'codusu' => 1,
                            'motcan' => $motcan->motcan,
                        ]);
                    } catch (\Exception $exception) {
                        // nothing
                    }

                    /*if ($res->estado == 'G' ) {
                        $this->rategain->createDirectInvoice($res, $reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);
                    }*/

                    $res->update([
                        'cancellationid' => $confirmationid,
                        'estado' => 'C'
                    ]);
                }

                $rategainRequest->update([
                    'response' => $returnSuccess,
                    'confirmation_id' => $confirmationid
                ]);

                return response()->xml($returnSuccess);
                break;
            default:
                $rategainRequest->update([
                    'response' => $this->rategain->reservationResponseError,
                    'confirmation_id' => 'ERROR'
                ]);
                return response()->xml($this->rategain->reservationResponseError);
        }
    }

    public function parseRequestXml($xml, $array = false)
    {
        try {
            $sxe = new \SimpleXMLElement($xml);
        } catch (\Exception $exception) {
            die($this->rategain->reservationResponseError);
        }

        $method = $sxe->getName();

        $object = $sxe;

        $json = json_encode($object);
        $matches = null;
        preg_match_all("|\"@attributes\"\:\{(.*)\}|U", $json, $matches);
        $cnt = 0;
        foreach ($matches[0] as $match) {
            $json = str_replace($matches[0][$cnt], $matches[1][$cnt], $json);
            $cnt++;
        }

        $data = json_decode($json, $array);

        return [
            'data' => $data,
            'method' => $method,
        ];
    }

    public function doValidation($reservationObject, $data)
    {
        $this->setRateGainConfig($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

        if (!is_array($reservationObject->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            $validation = \Validator::make($data, [
                'method' => 'required|in:OTA_HotelResNotifRQ',
                'data.ResStatus' => 'in:Commit,Modify,Cancel',
                // 'data.POS.Source.BookingChannel.CompanyName.Code' => 'required',
                'data.HotelReservations.HotelReservation.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.HotelReservations.HotelReservation.UniqueID.ID' => 'required',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode' => 'in:' . config('rategain.hotelCode'),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus' => 'in:new,Book,modified',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.RoomTypeCode' => 'required|in:' . implode(',', array_keys(config('rategain.rooms_cl'))),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.NumberOfUnits' => 'required',
                // 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                // 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate' => 'after:data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                // 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                // 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End' => 'after:data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
            ], [
                'data.ResStatus.in' => 'data.ResStatus',
                // 'data.POS.Source.BookingChannel.CompanyName.Code.required' => 'data.POS.Source.BookingChannel.CompanyName.Code',
                'data.HotelReservations.HotelReservation.ResStatus.in' => 'data.HotelReservations.HotelReservation.ResStatus',
                'data.HotelReservations.HotelReservation.UniqueID.ID.required' => 'data.HotelReservations.HotelReservation.UniqueID.ID',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode.in' => 'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus',
                'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                // 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate',
                // 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
                // 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End',
                // 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.RoomTypeCode.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
            ]);
        }

        if (is_array($reservationObject->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            $validation = \Validator::make($data, [
                'method' => 'required|in:OTA_HotelResNotifRQ',
                'data.ResStatus' => 'in:Commit,Modify,Cancel',
                // 'data.POS.Source.BookingChannel.CompanyName.Code' => 'required',
                'data.HotelReservations.HotelReservation.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.HotelReservations.HotelReservation.UniqueID.ID' => 'required',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode' => 'in:' . config('rategain.hotelCode'),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomStayStatus' => 'in:new,Book,modified',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode' => 'required|in:' . implode(',', array_keys(config('rategain.rooms_cl'))),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.NumberOfUnits' => 'required',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.ExpireDate' => 'after:data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End' => 'after:data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
            ], [
                'data.ResStatus.in' => 'data.ResStatus',
                // 'data.POS.Source.BookingChannel.CompanyName.Code.required' => 'data.POS.Source.BookingChannel.CompanyName.Code',
                'data.HotelReservations.HotelReservation.ResStatus.in' => 'data.HotelReservations.HotelReservation.ResStatus',
                'data.HotelReservations.HotelReservation.UniqueID.ID.required' => 'data.HotelReservations.HotelReservation.UniqueID.ID',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode.in' => 'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomStayStatus.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.NumberOfUnits.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.ExpireDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
            ]);
        }

        return $validation;
    }

    /**
     * @param int $lenght
     * @return false|string
     * @throws \Exception
     */
    function uniqidReal($lenght = 13)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            try {
                $bytes = random_bytes(ceil($lenght / 2));
            } catch (\Exception $e) {
                throw new \Exception("random_bytes function available");
            }
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

    public function getInstance($rgHotelCode)
    {
        $instance = BambooInstance::with('bambooInstanceRooms')
            ->where(
                'rg_hotel_code', $rgHotelCode
            )->first();

        if (!$instance) {

            dd('No hotel instance found!');
        }

        $instance = $instance->toArray();

        \Config::set("database.connections.on_the_fly", [
            "driver" => "mysql",
            "host" => $instance['db_host'],
            "port" => $instance['db_password'],
            "database" => $instance['db_database'],
            "username" => $instance['db_username'],
            "password" => $instance['db_password'],
            "unix_socket" => "",
            "charset" => "utf8",
            "collation" => "utf8_general_ci",
            "prefix" => "",
            "strict" => true,
            "engine" => null,
        ]);

        $rooms_cl = [];

        $rooms_lc = [];

        foreach ($instance['bamboo_instance_rooms'] as $key => $value) {
            $rooms_cl[$value['rg_room']] = $value['bb_room'];
            $rooms_lc[$value['bb_room']] = $value['rg_room'];
        }

        \Config::set("rategain", [
            'url' => $instance['rg_api_url'],
            'auth' => $instance['rg_auth'],
            'username' => $instance['rg_username'],
            'password' => $instance['rg_password'],
            'hotelCode' => $instance['rg_hotel_code'],
            'rooms_cl' => $rooms_cl,
            'rooms_lc' => $rooms_lc,
            'paymentType' => $instance['payment_type'],
            'warrantyType' => $instance['warranty_type'],
            'programType' => $instance['program_type'],
            'codpla' => $instance['codpla'],
            'tipres' => $instance['tipres'],
        ]);
		
		// dd(\Config::set("database.connections.on_the_fly"));
    }

    public function setRateGainConfig($rgHotelCode)
    {
        $instance = BambooInstance::with('bambooInstanceRooms')
            ->where(
                'rg_hotel_code', $rgHotelCode
            )->first();

        if (!$instance) {
            dd('No hotel instance found!');
        }

        $instance = $instance->toArray();

        $rooms_cl = [];

        $rooms_lc = [];

        foreach ($instance['bamboo_instance_rooms'] as $key => $value) {
            $rooms_cl[$value['rg_room']] = $value['bb_room'];
            $rooms_lc[$value['bb_room']] = $value['rg_room'];
        }

        \Config::set("rategain", [
            'url' => $instance['rg_api_url'],
            'auth' => $instance['rg_auth'],
            'username' => $instance['rg_username'],
            'password' => $instance['rg_password'],
            'hotelCode' => $instance['rg_hotel_code'],
            'rooms_cl' => $rooms_cl,
            'rooms_lc' => $rooms_lc,
            'paymentType' => $instance['payment_type'],
            'warrantyType' => $instance['warranty_type'],
            'programType' => $instance['program_type'],
            'codpla' => $instance['codpla'],
            'tipres' => $instance['tipres'],
        ]);
    }
}
