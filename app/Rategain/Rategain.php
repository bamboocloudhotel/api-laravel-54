<?php

namespace App\Rategain;

use App\Jobs\ModifyBookingEngineInventory;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\CrBooker;
use App\Models\CrBookerReserva;
use App\Models\CrGuarantee;
use App\Models\Tipdoc;

class Rategain
{
    /**
     * @var string
     */
    public $reservationResponseSuccess;

    /**
     * @var string
     */
    public $reservationResponseError;

    /**
     * @var string
     */
    public $inventoryModifyRequest;

    public $uit;

    public $aqc;

    /**
     * Rategain constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');
        $hotelId = config('rategain.hotelCode');

        $this->uit = [
            '1' => 'Customer',
            '2' => 'CRO (Customer Reservations Office)',
            '3' => 'Corporation representative',
            '4' => 'Company',
            '5' => 'Travel agency',
            '6' => 'Airline',
            '7' => 'Wholesaler',
            '8' => 'Car rental',
            '9' => 'Group',
            '10' => 'Hotel',
            '11' => 'Tour operator',
            '12' => 'Cruise line',
            '13' => 'Internet broker',
            '14' => 'Reservation',
            '15' => 'Cancellation',
            '16' => 'Reference',
            '17' => 'Meeting planning agency',
            '18' => 'Other',
            '19' => 'Insurance agency',
            '20' => 'Insurance agent',
            '21' => 'Profile',
            '22' => 'ERSP (Electronic reservation service provider)',
            '23' => 'Provisional reservation',
            '24' => 'Travel Agent PNR',
            '25' => 'Associated reservation',
            '26' => 'Associated itinerary reservation',
            '27' => 'Associated shared reservation',
            '28' => 'Alliance',
            '29' => 'Booking agent',
            '30' => 'Ticket',
            '31' => 'Divided reservation',
            '32' => 'Merchant',
            '33' => 'Acquirer',
            '34' => 'Master reference',
            '35' => 'Purged master reference',
            '36' => 'Parent reference',
            '37' => 'Child reference',
            '38' => 'Linked reference',
            '39' => 'Contract',
            '40' => 'Confirmation number',
            '41' => 'Fare quote',
            '42' => 'Reissue/refund quote',
            '43' => 'Ground transportation supplier',
            '44' => 'EMD',
        ];

        $this->aqc = [
            '1' => 'Over 21',
            '2' => 'Over 65',
            '3' => 'Under 2',
            '4' => 'Under 12',
            '5' => 'Under 17',
            '6' => 'Under 21',
            '7' => 'Infant',
            '8' => 'Child',
            '9' => 'Teenager',
            '10' => 'Adult',
            '11' => 'Senior',
            '12' => 'Additional occupant with adult',
            '13' => 'Additional occupant without adult',
            '14' => 'Free child',
            '15' => 'Free adult',
            '16' => 'Young driver',
            '17' => 'Younger driver',
            '18' => 'Under 10',
            '19' => 'Junior',
        ];

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
<OTA_HotelResNotifRS EchoToken="{$this->uniqidReal()}" TimeStamp="{$currentDate}T{$currentTime}">
    <Errors>
        <Error Code="450" Status="NotProcessed" ShortText="Invalid XML" />
    </Errors>
</OTA_HotelResNotifRS>
XML;

        $this->inventoryModifyRequest = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="{$currentDate}T{$currentTime}" Target="Production" Version="1.002" EchoToken="{$this->uniqidReal()}">
	<AvailStatusMessages HotelCode="{$hotelId}">
		<AvailStatusMessage BookingLimit="1" BookingLimitMessageType="SetLimit">
			<StatusApplicationControl Start="2020-03-01" End="2020-03-01" InvCode="SGL"></StatusApplicationControl>
			<UniqueID Type="16" ID="1"></UniqueID>
		</AvailStatusMessage>
	</AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;

    }


    /**
     * @param null $startDate
     * @param null $endDate
     * @param null $roomId
     * @param null $hotelId
     * @param null $quantity
     * @return array
     * @throws \Exception
     */
    public function modifyInventory($startDate = null, $endDate = null, $roomId = null, $hotelId = null, $quantity = null)
    {
        $hotelId = $hotelId ? $hotelId : config('rategain.hotelCode');
        $sDate = $startDate ? $startDate : date('Y-m-d');
        $eDate = $endDate ? $endDate : date('Y-m-d');
        $room = $roomId;

        $xml = $this->inventoryModifyRequest;

        $begin = new \DateTime($sDate);
        $end = new \DateTime($eDate);
        $end = $end->modify('+1 day');

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval, $end);

        $previous = null;
        $dates = [];
        foreach ($daterange as $dt) {
            $current = $dt->format("Y-m-d");
            if (!empty($previous)) {
                $show = new \DateTime($current);
                // $dates[] = [$previous, $show->format("Y-m-d")];
                $dates[] = $show->format("Y-m-d");
            } else {
                $dates[] = $dt->format("Y-m-d");
            }
            $previous = $current;
        }
        $return = [];
        foreach ($dates as $date) {
            $thisXml = str_replace('BookingLimit="1"', 'BookingLimit="' . $quantity . '"', $xml);
            $thisXml = str_replace('Start="2020-03-01"', 'Start="' . $date . '"', $thisXml);
            $thisXml = str_replace('End="2020-03-01"', 'End="' . $date . '"', $thisXml);
            $thisXml = str_replace('InvCode="SGL"', 'InvCode="' . $room . '"', $thisXml);
            $thisXml = str_replace('InvCode="SGL"', 'InvCode="' . $room . '"', $thisXml);
            $thisXml = str_replace('ID="1"', 'ID="' . $this->uniqidReal() . '"', $thisXml);

/*            $thisXml  = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="2020-10-12T12:36:17" Target="Production" Version="1.002" EchoToken="576198818f398">
<AvailStatusMessages HotelCode="20915">
<AvailStatusMessage BookingLimit="100" BookingLimitMessageType="SetLimit">
<StatusApplicationControl Start="2020-10-12" End="2020-10-12" InvCode="SGL"></StatusApplicationControl>
<UniqueID Type="16" ID="e994cbd9bf48d"></UniqueID></AvailStatusMessage>
<AvailStatusMessage BookingLimit="100" BookingLimitMessageType="SetLimit">
<StatusApplicationControl Start="2020-10-13" End="2020-10-13" InvCode="SGL"></StatusApplicationControl>
<UniqueID Type="16" ID="e994cbd9bf48d"></UniqueID></AvailStatusMessage>
</AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;*/
$printDate = date('Y-m-d');
$printTime = date('H:i:s');
$thisXml  = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="{$printDate}T{$printTime}" Target="Production" Version="1.002" EchoToken="576198818f398">
<AvailStatusMessages HotelCode="20915">
<AvailStatusMessage BookingLimit="0" BookingLimitMessageType="SetLimit">
<StatusApplicationControl Start="2021-01-01" End="2021-01-01" InvCode="SGL"></StatusApplicationControl>
<UniqueID Type="16" ID="e994cbd9bf48d"></UniqueID>
</AvailStatusMessage>
</AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;
            // dd($thisXml);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERPWD, config('rategain.username') . ":" . config('rategain.password'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $thisXml);
            curl_setopt($ch, CURLOPT_URL, config('rategain.url'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            $data = curl_exec($ch);
            curl_close($ch);
			
			// dd($data);    

            preg_match_all("|\"><(.*)\s/></OTA_HotelAvailNotifRS>|U", $data, $matches);

            $return[] = [
                'room' => $room,
                'date' => $date,
                'quantity' => $quantity,
                'updated' => isset($matches[1][0]) ? $matches[1][0] : 'Undefined',
                'booking_engine' => 'rategain',
                'xml' => $data,
            ];
        }

        return $return;
    }

    /**
     * @param $reservationAttributes
     * @param $roomClass
     * @return mixed
     */
    public function getBambooAvailability($reservationAttributes, $roomClass)
    {
        $roomsOccupied = [];

        $end = $reservationAttributes->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->End;
        $start = $reservationAttributes->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start;
        $class = (int)$roomClass;

        $roomsBlocked = collect(\DB::connection('hhotel5')->select("
                SELECT blohab.numhab
                FROM blohab
                INNER JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE blohab.fecini <= '{$end}' AND blohab.fecfin >= '{$start}'
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$class}
            "));

        foreach ($roomsBlocked as $roomBlocked) {
            $roomsOccupied[] = $roomBlocked->numhab;
        }

        $roomsReserved = collect(\DB::connection('hhotel5')->select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE reserva.feclle < '{$end}' AND reserva.fecsal > '{$start}'
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$class}
            "));

        foreach ($roomsReserved as $roomReserved) {
            $roomsOccupied[] = $roomReserved->numhab;
        }

        $roomsHosted = collect(\DB::connection('hhotel5')->select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla, folio.numfol, folio.estado
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                INNER JOIN folio ON reserva.numhab = folio.numres
                WHERE reserva.feclle < '{$end}' AND reserva.fecsal > '{$start}'
                AND reserva.estado IN ('H')
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$class}
            "));

        foreach ($roomsHosted as $roomHosted) {
            $roomsOccupied[] = $roomHosted->numhab;
        }

        $roomsOccupied = implode('\',\'', $roomsOccupied);

        $numhab = collect(\DB::connection('hhotel5')->select("
            select habitacion.numhab 
            from habitacion 
            where habitacion.numhab not in ('{$roomsOccupied}')
            AND habitacion.codcla = {$class}
            "));

        return $numhab->toArray();
    }

    /**
     * @param $in
     * @param $out
     * @param $roomClass
     * @return array
     */
    public function getBambooQuantityAvailability($in, $out, $roomClass)
    {
        // \DB::connection('hhotel5');
        $roomsOccupied = [];

        $roomsBlocked = collect(\DB::connection('hhotel5')->select("
                SELECT blohab.numhab
                FROM blohab
                INNER JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE blohab.fecini <= '$out' AND blohab.fecfin >= '$in'
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsBlocked as $roomBlocked) {
            $roomsOccupied[] = $roomBlocked->numhab;
        }

        $roomsReserved = collect(\DB::connection('hhotel5')->select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
                FROM reserva
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE reserva.feclle <= '$out' AND reserva.fecsal > '$in'
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsReserved as $roomReserved) {
            $roomsOccupied[] = $roomReserved->numhab;
        }

        $roomsHosted = collect(\DB::connection('hhotel5')->select("
                SELECT folio.numres, folio.numhab, folio.estado, habitacion.codcla, folio.numfol
                FROM folio
                INNER JOIN habitacion ON folio.numhab = habitacion.numhab
                WHERE folio.feclle <= '$out' AND folio.fecsal > '$in'
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsHosted as $roomHosted) {
            $roomsOccupied[] = $roomHosted->numhab;
        }

        $roomsOccupied = implode('\',\'', $roomsOccupied);

        $numhabs = collect(\DB::connection('hhotel5')->select("
            select habitacion.numhab, habitacion.numcam
            from habitacion 
            where habitacion.numhab not in ('{$roomsOccupied}')
            AND habitacion.codcla = {$roomClass}
            "));

        $availability = [
            'rooms' => 0,
            'beds' => 0,
            'occupied' => '\'' . $roomsOccupied . '\'',
            'class' => config('rategain.rooms_lc.' . $roomClass),
        ];

        foreach ($numhabs as $numhab) {
            $availability['rooms'] += 1;
            $availability['beds'] += $numhab->numcam;
        }

        return $availability;
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

    public function getReservationError($errorsArray)
    {
        $xml = $this->reservationResponseError;

        $errors = "<Errors>";

        $responseErrors = [
            'data.ResStatus' => [
                'Code' => 321,
                'ShortText' => 'Invalid data ResStatus'
            ],
            'data.POS.Source.BookingChannel.CompanyName.Code' => [
                'Code' => 321,
                'ShortText' => 'Invalid data POS Source BookingChannel CompanyName Code'
            ],
            'data.HotelReservations.HotelReservation.ResStatus' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation ResStatus'
            ],
            'data.HotelReservations.HotelReservation.UniqueID.ID' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation UniqueID ID'
            ],
            'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode' => [
                'Code' => 400,
                'ShortText' => 'Invalid data HotelReservations HotelReservation BasicPropertyInfo HotelCode'
            ],
            'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation RoomStays RoomStay RoomStayStatus'
            ],
            'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode' => [
                'Code' => 402,
                'ShortText' => 'Invalid data HotelReservations HotelReservation RoomStays RoomRates RoomRate RoomTypeCode'
            ],
            'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation RoomStays RoomRates RoomRate NumberOfUnits'
            ],
            'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation RoomStays RoomStay RoomRates RoomRate Rates Rate EffectiveDate'
            ],
            'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation RoomStays RoomStay RoomRates RoomRate Rates Rate ExpireDate'
            ],
            'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation ResGlobalInfo TimeSpan End'
            ],
            'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start' => [
                'Code' => 321,
                'ShortText' => 'Invalid data HotelReservations HotelReservation ResGlobalInfo TimeSpan Start'
            ],

            'noAvailabilities' => [
                'Code' => 450,
                'ShortText' => 'No room availabilities'
            ],

        ];

        foreach ($errorsArray as $error) {
            if (is_array($error)) {
                foreach ($error as $err) {
                    $errors .= "\n\t\t<Error Code=\"" . $responseErrors[$err]['Code'] . "\" Status=\"NotProcessed\" ShortText=\"" . $responseErrors[$err]['ShortText'] . "\" />";
                }
            } else {
                $errors .= "\n\t\t<Error Code=\"" . $responseErrors[$error]['Code'] . "\" Status=\"NotProcessed\" ShortText=\"" . $responseErrors[$error]['ShortText'] . "\" />";
            }

        }

        $errors .= "\n\t</Errors>";

        $xml = str_replace('<Errors>
        <Error Code="450" Status="NotProcessed" ShortText="Invalid XML" />
    </Errors>', $errors, $xml);

        return $xml;
    }

    public function saveReservation($data)
    {
		
		$resGuest = null;
		$booker = null;
		$bookerExists = null;
		$guestExits = null;

		// dd($data->HotelReservations->HotelReservation->ResGuests->ResGuest);
		
		foreach ($data->HotelReservations->HotelReservation->ResGuests->ResGuest as $guest) {
			
			// dd($guest->Profiles->ProfileInfo->Profile->ProfileType, $resGuest->Email);

			if ($guest->Profiles->ProfileInfo->Profile->ProfileType == 1 && isset($guest->Email)) {
				// dd($guest->Profiles->ProfileInfo->Profile->Customer);
				$resGuest = $guest->Profiles->ProfileInfo->Profile->Customer;
				$guestExits = Cliente::where('email', $resGuest->Email)->first();

                if (!$guestExits) {


                    try {

                        $client = [
                            'cedula' => 0,
                            'nombre' => $resGuest->PersonName->GivenName . ' ' . $resGuest->PersonName->Surname,
                            'telefono1' => $resGuest->PersonName->GivenName->Telephone->PhoneNumber,
                            'email' => $resGuest->Email,
                            'primer_nombre' => $resGuest->PersonName->GivenName,
                            'primer_apellido' => $resGuest->PersonName->Surname,
                            'emailfe' =>$resGuest->Email
                        ];

                        Cliente::create($client);

                    } catch(\Exception $exception) {
                        echo $exception->getMessage();
                        die;
                    }


                }

			}
			// dd($guest->Profiles->ProfileInfo->Profile->ProfileType);
			if ($guest->Profiles->ProfileInfo->Profile->ProfileType == 18 && isset($booker->Email)) {
				// dd($guest->Profiles->ProfileInfo->Profile->Customer);
				$booker = $guest->Profiles->ProfileInfo->Profile->Customer;
				$bookerExists = CrBooker::where('email', $booker->Email)->first();
				if (!$bookerExists) {
					
					//dd($booker->Address->AddressLine);
					
					try {
						$booker = [
							'givenname' => $booker->PersonName->GivenName,
							'surname' => $booker->PersonName->Surname,
							'phone' => $booker->Telephone->PhoneNumber,
							'email' => $booker->Email,
							'address' => isset($booker->Address->AddressLine) ? json_encode($booker->Address->AddressLine) : '',
							'city' => isset($booker->Address->CityName) ? json_encode($booker->Address->CityName) : '',
							'postal_code' => isset($booker->Address->PostalCode) ? json_encode($booker->Address->PostalCode) : '',
							'country' => isset($booker->Address->CountryName->Code) ? $booker->Address->CountryName->Code : '',
						];
						
						$booker = CrBooker::create($booker);	
						
					} catch(\Exception $exception) {
						echo $exception->getMessage();
						die;
					}
				}
				
				if ($bookerExists) {
					$booker = $bookerExists;
				}
			}
		}

		// dd($data->HotelReservations->HotelReservation->RoomStays->RoomStay);
		
        if (!is_array($data->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            $data->HotelReservations->HotelReservation->RoomStays->RoomStay = [
                $data->HotelReservations->HotelReservation->RoomStays->RoomStay
            ];
        }

        $availables = [];

        $selectedRooms = [];

        foreach ($data->HotelReservations->HotelReservation->RoomStays->RoomStay as $roomStay) {
        	// dd($roomStay->RoomRates->RoomRate->RoomTypeCode);
            $roomClass = config('rategain.rooms_cl.' . $roomStay->RoomRates->RoomRate->RoomTypeCode);
			
            if ($this->getBambooAvailability($data, $roomClass)) {
                $availables[] = $this->getBambooAvailability($data, $roomClass);
                $selectedRooms[] = $this->getBambooAvailability($data, $roomClass)[0];
            }
        }

        if ($selectedRooms) {
            for ($i = 0; $i <= count($selectedRooms); $i++) {
                if ($i > 0 && $i < count($selectedRooms)) {
                    if ($selectedRooms[$i]->numhab == $selectedRooms[$i - 1]->numhab) {
                        for ($j = 0; $j <= count($availables[$i - 1]); $j++) {
                            if (($j > 0 && $j < count($availables[$i - 1]))) {
                                if ($selectedRooms[$i - 1]->numhab != $availables[$i - 1][$j]->numhab) {
                                    $selectedRooms[$i - 1]->numhab = $availables[$i - 1][$j]->numhab;
                                    break 2;
                                }
                            } else {
                                $selectedRooms[$i - 1]->numhab = null;
                            }
                        }
                    }
                }
            }
        }
		

        foreach ($selectedRooms as $selectedRoom) {
            if (null == $selectedRoom->numhab) {
                return $this->getReservationError(['noAvailabilities']);
            }
        }

        if (!$availables) {
            return $this->getReservationError(['noAvailabilities']);
        }

        // dd($data->HotelReservations->HotelReservation->RoomStays->RoomStay);

        if (count($availables) < count($data->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            return $this->getReservationError(['noAvailabilities']);
        }
        $tipDoc = Tipdoc::where('detalle', 'CEDULA CIUDADANIA')->first();
        $confirmationid = $this->uniqidReal(16);
        $guaranteeText = "";

        $roomStayCnt = 0;
        foreach ($data->HotelReservations->HotelReservation->RoomStays->RoomStay as $roomStay) {
			
			$guarantee = null;

			// dd(isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Guarantee));
			
			if (
				isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Guarantee)
			) {

                $guarantee = $data->HotelReservations->HotelReservation->ResGlobalInfo->Guarantee;

				if (isset($guarantee->GuaranteesAccepted)) {
					
					//$guaranteePaymentCard = $guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard;
			
					//$guaranteeText = "{$guarantee->GuaranteeCode}: {$guarantee->GuaranteeType}\n{$guaranteePaymentCard->CardCode}\n{$guaranteePaymentCard->CardNumber}\n{$guaranteePaymentCard->ExpireDate}\n{$guaranteePaymentCard->CardHolderName}";
                    $guaranteeText .=  json_encode($guarantee->GuaranteesAccepted, true);
				}
				
				
			}

			if (isset($data->HotelReservations->HotelReservation->ResGlobalInfo->EncodedCCInfo)) {
				$guaranteeText .= $data->HotelReservations->HotelReservation->ResGlobalInfo->EncodedCCInfo;
			}

            $numadu = 0;
            $numnin = 0;

            if (isset($roomStay->GuestCounts)) {
                foreach ($roomStay->GuestCounts->GuestCount as $guestCount) {
                    if ($guestCount->AgeQualifyingCode == 10) {
                        $numadu = $guestCount->Count;
                    }

                    if ($guestCount->AgeQualifyingCode == 8) {
                        $numnin = $guestCount->Count;
                    }
                }
            }
			
            $roomClass = config('rategain.rooms_cl.' . $roomStay->RoomRates->RoomRate->RoomTypeCode);
            $numres = collect(\DB::connection('hhotel5')->select('select MAX(numres)+1 as res from reserva limit 1'))->first();
            $dathot = collect(\DB::connection('hhotel5')->select("select nit, numrec from dathot;"))->first();
            $numres = $numres->res;
            $nit = explode('.', $dathot->nit);
            $nit = implode('', $nit);
            $nit = explode('-', $nit);
            $nit = $nit[0];
            $numrec = $dathot->numrec;
            $numhab = $selectedRooms[$roomStayCnt]->numhab;

            // dd($roomStay->RoomRates->RoomRate->RoomTypeCode);

            // {$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Address->CountryName}
            // {$resGuest->Address->AddressLine}
// {$resGuest->Address->CityName}
// {$resGuest->Address->PostalCode}


            $observacion = $resGuest ? "
{$resGuest->PersonName->GivenName} {$resGuest->PersonName->Surname}

{$resGuest->Telephone->PhoneNumber}
{$resGuest->Email}

RateGain {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type} {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value}
RateGain {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type} {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value}
            "  : '';
            $paymentType = config('cm_reservas.paymentType');
            $warrantyType = config('cm_reservas.warrantyType');
            $programType = config('cm_reservas.programType');
            $tipres = config('cm_reservas.tipres');
            $metadata = json_encode($data);

            // dd($roomStay->Comments->Comment);

            try {
                $newReservation = Reserva::create([
                    'numres' => $numres,
                    'referencia' => 'RateGain ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
                    'tipdoc' => $guestExits ? $guestExits->tipdoc : $tipDoc->tipdoc,
                    'cedula' => $guestExits ? $guestExits->cedula : 0,
                    'nit' => $nit,
                    'numhab' => $numhab,
                    'tipres' => $tipres,
					'tipseg' => 'I',
                    'fecres' => date('Y-m-d'),
                    'feclle' => $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start,
                    'fecsal' => $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->End,
                    'feclim' => $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start,
                    'hora' => '12:00',
                    'numadu' => $numadu, // count($data->HotelReservations->HotelReservation->ResGuests->ResGuest),
                    'numnin' => $numnin,
                    'observacion' => $guestExits ? '' : $observacion,
                    'habfij' => 'N',
                    'solicitada' => "{$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->GivenName} {$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->Surname}",
                    'forpag' => $paymentType,
                    'fecest' => date('Y-m-d'),
                    'estado' => 'G',
                    'tippro' => $programType,
                    'tipgar' => $warrantyType,
                    'codven' => 1,
                    'metadata' => $metadata,
                    'guarantee' => ' ' . $guaranteeText,
                    'confirmationid' => $confirmationid,
					'onlinecomment' => isset($roomStay->Comments) ? '' . (is_array($roomStay->Comments->Comment) ? json_encode($roomStay->Comments->Comment) : $roomStay->Comments->Comment) : '',
					'cancellationid' => null
                ]);
            } catch (\Exception $exception) {
				dd($exception->getMessage());
            }

            // dd($booker);

			
			if ($booker) {
				$bookerReserva = CrBookerReserva::create([
					'booker_id' => $booker->id,
					'numres' => $numres,
					'amount' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax,
					'date' => date('Y-m-d H:i:s'),
					'booker_name' => $booker->givenname . ' ' . $booker->surname,
				]);
			}
			
			if ($guarantee) {
				$reservaGuarantee = CrGuarantee::create([
					'type' => $guarantee->GuaranteeType,
					'code' => isset($guaranteePaymentCard) ? ($guarantee->GuaranteeCode . ': ' . $guaranteePaymentCard->CardCode) : '',
					'number' => isset($guaranteePaymentCard) ? $guaranteePaymentCard->CardNumber : '',
					'expire' => isset($guaranteePaymentCard) ? $guaranteePaymentCard->ExpireDate : '',
					'holder' => isset($guaranteePaymentCard) ? $guaranteePaymentCard->CardHolderName : '',
					'amount' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax,
					'currency' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->CurrencyCode,
					'numres' => $numres
				]);
			}

            $codpla = config('cm_reservas.codpla');
            $dayPriceCnt = 1;

            // dd($roomStay->RoomRates->RoomRate->Rates->Rate);

            if (is_array($roomStay->RoomRates->RoomRate->Rates->Rate)) {
                foreach ($roomStay->RoomRates->RoomRate->Rates->Rate as $dayPrice) {
                    $queryPlares = "
                    INSERT INTO plares
                    (numres, numpla, codpla, fecini, fecfin, pordes, tipdes, valornoche, codigocr)
                    VALUES({$numres}, {$dayPriceCnt}, {$codpla}, '{$dayPrice->EffectiveDate}', '{$dayPrice->ExpireDate}', 0, 'P', {$dayPrice->Base->AmountBeforeTax}, '{$roomStay->RoomRates->RoomRate->RatePlanCode}');
                    ";
                    try {
                        
                        \DB::connection('hhotel5')->insert($queryPlares);
                        $dayPriceCnt++;
                        
                    } catch(Exception $exception) {
                        dd($exception->getMessage());
                    }
                }
            } else {
                $queryPlares = "
                    INSERT INTO plares
                    (numres, numpla, codpla, fecini, fecfin, pordes, tipdes, valornoche, codigocr)
                    VALUES({$numres}, {$dayPriceCnt}, {$codpla}, '{$roomStay->RoomRates->RoomRate->Rates->Rate->EffectiveDate}', '{$roomStay->RoomRates->RoomRate->Rates->Rate->ExpireDate}', 0, 'P', {$roomStay->RoomRates->RoomRate->Rates->Rate->Base->AmountBeforeTax}, '{$roomStay->RoomRates->RoomRate->RatePlanCode}');
                ";
                try {
                    
                    \DB::connection('hhotel5')->insert($queryPlares);
                    $dayPriceCnt++;
                    
                } catch(Exception $exception) {
                    dd($exception->getMessage());
                }
            }

            $address = '';

            // $address .= json_encode($data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Address, true);

            
   //          $queryReccaj = "
   //          INSERT INTO reccaj
   //          (numrec, cedula, nombre, direccion, ciudad, telefono, fecha, codcaj, codusu, codcar, codven, nota, estado)
   //          VALUES(
   //                 {$numrec}, 
   //                 '0', 
   //                 '{$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->GivenName} {$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->Surname}', 
   //                 '{$address}', 
   //                 'na', 
   //                 '{$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Telephone->PhoneNumber}', 
   //                 CURRENT_DATE, 
   //                 1, 
   //                 1, 
   //                 54,
   //                 0, 
   //                 'Pago de reserva por RateGain.', 
   //                 'A'
   //             );
   //          ";
			
			// try {
					
			// 	\DB::connection('hhotel5')->insert($queryReccaj);
				
			// } catch(Exception $exception) {
			// 	dd($exception->getMessage());
			// }

   //          $queryDetrec = "
   //          INSERT INTO detrec
   //          (numrec, numero, forpag, numfor, fecven, ivarep, valorm, valor)
   //          VALUES({$numrec}, 1, 1, 0, CURRENT_DATE, 0, 0, {$data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax});
   //          ";
			
			// try {
					
			// 	\DB::connection('hhotel5')->insert($queryDetrec);
				
			// } catch(Exception $exception) {
			// 	dd($exception->getMessage());
			// }

   //          $queryGarres = "
   //          INSERT INTO garres
   //          (numres, item, codusu, codcaj, fecha, codcar, total, numrec, numegr, estado)
   //          VALUES({$numres}, 1, 1, 3, CURRENT_TIMESTAMP, 54, {$data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax}, {$numrec}, 0, 'A');
   //          ";
			
			// try {
					
			// 	\DB::connection('hhotel5')->insert($queryGarres);
				
			// } catch(Exception $exception) {
			// 	dd($exception->getMessage());
			// }

   //          $nNumrec = ($numrec + 1);
			
			// try {
					
			// 	\DB::connection('hhotel5')->update("
			// 	UPDATE dathot
			// 	SET
			// 	numrec = {$nNumrec}
			// 	WHERE numrec = {$numrec};
			// 	");
				
			// } catch(Exception $exception) {
			// 	dd($exception->getMessage());
			// }

            $queryNumfolio = "select MAX(numfol)+1 as fol from folio";

            $numfolio = collect(\DB::connection('hhotel5')->select($queryNumfolio))->first();
            $resDate = substr($data->TimeStamp, 0, 10);
            $sqlFolio = "
            INSERT INTO folio
            (numfol, numres, codeve, tipdoc, cedula, nit, nitage, locpro, codpai, codciu, paides, locdes, ciudes, codtra, trasal, codmot, numhab, usuout, codusu, fecres, feclle, fecsal, hora, horsal, numadu, numnin, numinf, nota, notaayb, equipaje, placa, trahot, estpai, corregir, forpag, estado, walkin, tippro, tipgar, codven, idresweb, idcanal, idclifre)
            VALUES(
            {$numfolio->fol}, 
            {$numres}, 
            0,
            {$tipDoc->tipdoc}, 
            '0',
            '0', 
            '0', 
            127591, 
            null, 
            null, 
            null, 
            129499, 
            null, 
            0, 
            0, 
            null, 
            '$numhab', 
            null, 
            null, 
            '{$resDate}', 
            '{$data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start}', 
            '{$data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->End}', 
            null, 
            null, 
            1, 
            0, 
            0, 
            'FOLIO CREADO PARA GARANTIZAR RESERVA EN LINEA RateGain', 
            '', 
            'N', 
            null, 
            'N', 
            null, 
            'N', 
            null,
            'O', 
            'A', 
            '', 
            '', 
            0, 
            null,
            null,
            null           
            );
            ";
			
			try {
					
				\DB::connection('hhotel5')->insert($sqlFolio);
				
			} catch(Exception $exception) {
				dd($exception->getMessage());
			}

            $queryValcar = "
                INSERT INTO valcar
                (numfol, numcue, item, codusu, codcaj, fecha, cantidad, codcar, cladoc, numdoc, codpla, valor, iva, impo, valser, valter, total, estado, oldfol, movcor)
                VALUES({$numfolio->fol}, 1, 1, 3, 7, CURRENT_TIMESTAMP, 1, 54, 'RC', '2109', null, {$data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax}, 0, null, 0, 0, {$data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax}, 'A', null, 'N');
            ";
			
			try {
					
				\DB::connection('hhotel5')->insert($queryValcar);
				
			} catch(Exception $exception) {
				dd($exception->getMessage());
			}

            $roomStayCnt++;
        }

        $returnSuccess = $this->reservationResponseSuccess;

        $returnSuccess = str_replace(
            '<HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>',
            '<HotelReservationID ResID_Type="14" ResID_Value="' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '"/>',
            $returnSuccess
        );

        $returnSuccess = str_replace(
        	'<HotelReservationID ResID_Type="3" ResID_Value="123456789" />',
        	'<HotelReservationID ResID_Type="3" ResID_Value="' . $confirmationid . '" />', 
        	$returnSuccess
        );

        $job = (
            new ModifyBookingEngineInventory(
                $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start,
                $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->End,
                $roomClass,
                'rategain')
        );

        dispatch($job);


        return $returnSuccess;

    }

}
