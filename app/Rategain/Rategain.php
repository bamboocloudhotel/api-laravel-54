<?php

  namespace App\Rategain;

  use App\Http\Controllers\Api\TestSoapController;
  use App\Jobs\ModifyBookingEngineInventory;
  use App\Models\Dathot;
  use App\Models\Detrec;
  use App\Models\Folio;
  use App\Models\Garres;
  use App\Models\Plares;
  use App\Models\Reccaj;
  use App\Models\Reserva;
  use App\Models\Cliente;
  use App\Models\CrBooker;
  use App\Models\CrBookerReserva;
  use App\Models\CrGuarantee;
  use App\Models\Tipdoc;
  use App\Models\Valcar;
  use App\Models\Empresa;
  use App\Models\CrChannel;
  use App\Models\Valmon;

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

      // dd(config('rategain'));

      $hotelId = $hotelId ? $hotelId : config('rategain.hotelCode');
      $sDate = $startDate ? $startDate : date('Y-m-d');
      $eDate = $endDate ? $endDate : date('Y-m-d');
      $room = $roomId;

      // dd($hotelId, $sDate, $eDate, $room);

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
        $printDate = date('Y-m-d');
        $printTime = date('H:i:s');

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

        // dd($data, $thisXml);

        preg_match_all("|\"><(.*)\s/></OTA_HotelAvailNotifRS>|U", $data, $matches);

        // dd($data);

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

    public function sendAvailability($feclle, $fecsal, $codcla)
    {

      $fecsal = date('Y-m-d H:i:s', strtotime($fecsal . ' +1 day'));

      $period = new \DatePeriod(
        new \DateTime($feclle),
        new \DateInterval('P1D'),
        new \DateTime($fecsal)
      );

      $dates = [];

      foreach ($period as $key => $value) {
        $dates[] = $value->format('Y-m-d');
      }

      $return = [];

      foreach ($dates as $date) {
        $start = $date;
        $end = date('Y-m-d H:i:s', strtotime($date . ' +1 day'));
        $sqlAvailable = "
          SELECT * 
          FROM habitacion 
          WHERE numhab NOT IN(
            SELECT reserva.numhab 
            FROM reserva 
            INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
            WHERE '{$start}' < reserva.fecsal 
            AND '{$end}' > reserva.feclle 
            AND reserva.estado IN ('P','G')
            AND habitacion.codcla = {$codcla}
            AND habitacion.tipo = 'V'
          )
          AND numhab NOT IN(
            SELECT folio.numhab 
            FROM folio
            INNER JOIN habitacion ON folio.numhab = habitacion.numhab
            WHERE '{$start}' < folio.fecsal 
            AND '{$end}' > folio.feclle 
            AND folio.estado IN ('I')
            AND habitacion.codcla = {$codcla}
            AND habitacion.tipo = 'V'
          )
          AND numhab NOT IN(
            SELECT blohab.numhab
            FROM blohab
            LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
            WHERE '{$start}' <= blohab.fecfin 
            AND '{$end}' >= blohab.fecini
            AND blohab.fecdes IS NULL
            AND habitacion.codcla = {$codcla}
            AND habitacion.tipo = 'V'
          )
          AND codcla = {$codcla}
          AND tipo = 'V'
        ";

        $roomsAvailable = collect(\DB::connection('on_the_fly')->select($sqlAvailable));

        $xml = $this->inventoryModifyRequest;

        $thisXml = str_replace('BookingLimit="1"', 'BookingLimit="' . $roomsAvailable->count() . '"', $xml);
        $thisXml = str_replace('Start="2020-03-01"', 'Start="' . $date . '"', $thisXml);
        $thisXml = str_replace('End="2020-03-01"', 'End="' . $date . '"', $thisXml);
        $thisXml = str_replace('InvCode="SGL"', 'InvCode="' . $codcla . '"', $thisXml);
        $thisXml = str_replace('ID="1"', 'ID="' . $this->uniqidReal() . '"', $thisXml);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERPWD, config('rategain.username') . ":" . config('rategain.password'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $thisXml);
        curl_setopt($ch, CURLOPT_URL, config('rategain.url'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = curl_exec($ch);
        curl_close($ch);

        // dd($data, $thisXml);

        preg_match_all("|\"><(.*)\s/></OTA_HotelAvailNotifRS>|U", $data, $matches);

        $return[] = [
          'room' => $codcla,
          'date' => $date,
          'quantity' => $roomsAvailable->count(),
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
    public function getAvailability($start, $end, $roomClass = null)
    {
      $roomsOccupied = [];

      $class = $roomClass ? (int)$roomClass : null;
      // dd($end, $start, $roomClass, $class);

      $rBlockedQry = "
			SELECT blohab.numhab
			FROM blohab
			INNER JOIN habitacion ON blohab.numhab = habitacion.numhab
			WHERE blohab.fecini <= '{$end}' AND blohab.fecfin >= '{$start}'
			AND blohab.fecdes IS NULL
			AND habitacion.tipo = 'V'
		";

      if ($class) {
        $rBlockedQry .= "AND habitacion.codcla = {$class}";
      }


      $roomsBlocked = collect(\DB::connection('on_the_fly')->select($rBlockedQry));

      foreach ($roomsBlocked as $roomBlocked) {
        $roomsOccupied[] = $roomBlocked->numhab;
      }

      $rReservedQry = "
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE reserva.feclle <= '{$end}' AND reserva.fecsal >= '{$start}'
                AND reserva.estado IN ('P','G')
                AND habitacion.tipo = 'V'
            ";

      if ($class) {
        $rReservedQry .= "AND habitacion.codcla = {$class}";
      }

      $roomsReserved = collect(\DB::connection('on_the_fly')->select($rReservedQry));

      foreach ($roomsReserved as $roomReserved) {
        $roomsOccupied[] = $roomReserved->numhab;
      }

      $rHostedQry = "
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla, folio.numfol, folio.estado
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                INNER JOIN folio ON reserva.numhab = folio.numres
                WHERE reserva.feclle <= '{$start}' AND reserva.fecsal >= '{$end}'
                AND reserva.estado IN ('H')
                AND folio.estado IN ('I')
                AND habitacion.tipo = 'V'
            ";

      if ($class) {
        $rHostedQry .= "AND habitacion.codcla = {$class}";
      }

      $roomsHosted = collect(\DB::connection('on_the_fly')->select($rHostedQry));

      foreach ($roomsHosted as $roomHosted) {
        $roomsOccupied[] = $roomHosted->numhab;
      }

      $roomsOccupied = "'" . implode('\',\'', $roomsOccupied) . "'";
      // dd($roomsOccupied);

      $numhabQry = "
			select habitacion.numhab 
            from habitacion 
            where habitacion.numhab not in ({$roomsOccupied})
            AND habitacion.tipo = 'V'
		";

      if ($class) {
        $numhabQry .= "AND habitacion.codcla = {$class}";
      }

      $numhab = collect(\DB::connection('on_the_fly')->select($numhabQry));

      // dd($numhab->sort()->toArray());

      return $numhab->sort()->toArray();
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

      // dd($start, $end, $class);

      $roomsBlocked = collect(\DB::connection('on_the_fly')->select("
                SELECT blohab.numhab
                FROM blohab
                LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE '{$start}' <= blohab.fecfin 
                AND '{$end}' >= blohab.fecini
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$class}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsBlocked as $roomBlocked) {
        $roomsOccupied[] = $roomBlocked->numhab;
      }

      $roomsReserved = collect(\DB::connection('on_the_fly')->select("
                SELECT reserva.numhab 
                FROM reserva 
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE '{$start}' < reserva.fecsal 
                AND '{$end}' > reserva.feclle 
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$class}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsReserved as $roomReserved) {
        $roomsOccupied[] = $roomReserved->numhab;
      }

      $roomsHosted = collect(\DB::connection('on_the_fly')->select("
                SELECT folio.numhab 
                FROM folio
                INNER JOIN habitacion ON folio.numhab = habitacion.numhab
                INNER JOIN reserva ON folio.numres = reserva.numres
                WHERE '{$start}' < folio.fecsal 
                AND '{$end}' > folio.feclle 
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$class}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsHosted as $roomHosted) {
        $roomsOccupied[] = $roomHosted->numhab;
      }

      $roomsOccupied = implode('\',\'', array_unique($roomsOccupied));

      // dd($roomsOccupied);

      $numhab = collect(\DB::connection('on_the_fly')->select("
            select habitacion.numhab 
            from habitacion 
            where habitacion.numhab not in ('{$roomsOccupied}')
            AND habitacion.codcla = {$class}
            AND habitacion.tipo = 'V'
            "));

      // dd($numhab->sort()->toArray());

      return $numhab->sort()->toArray();
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

      $roomsBlocked = collect(\DB::connection('on_the_fly')->select("
                SELECT blohab.numhab
                FROM blohab
                LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE '{$in}' <= blohab.fecfin 
                AND '{$out}' >= blohab.fecini
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$roomClass}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsBlocked as $roomBlocked) {
        $roomsOccupied[] = $roomBlocked->numhab;
      }

      $roomsReserved = collect(\DB::connection('on_the_fly')->select("
                SELECT reserva.numhab 
                FROM reserva 
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE '{$in}' < reserva.fecsal 
                AND '{$out}' > reserva.feclle 
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$roomClass}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsReserved as $roomReserved) {
        $roomsOccupied[] = $roomReserved->numhab;
      }

      $roomsHosted = collect(\DB::connection('on_the_fly')->select("
                SELECT folio.numhab 
                FROM folio
                INNER JOIN habitacion ON folio.numhab = habitacion.numhab
                INNER JOIN reserva ON folio.numres = reserva.numres
                WHERE '{$in}' < folio.fecsal 
                AND '{$out}' > folio.feclle 
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$roomClass}
                AND habitacion.tipo = 'V'
            "));

      foreach ($roomsHosted as $roomHosted) {
        $roomsOccupied[] = $roomHosted->numhab;
      }

      $roomsOccupied = implode('\',\'', $roomsOccupied);

      $numhabs = collect(\DB::connection('on_the_fly')->select("
            SELECT habitacion.numhab, habitacion.numcam
            FROM habitacion 
            WHERE habitacion.numhab NOT IN ('{$roomsOccupied}')
            AND habitacion.codcla = {$roomClass}
            AND habitacion.tipo = 'V'
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
      $cedula = 0;
      $company = null;

      $bookingChannel = null;
      $bambooCompanyNit = null;

      if (isset($data->POS->Source->BookingChannel->CompanyName->Code)) {
        $bookingChannel = $data->POS->Source->BookingChannel->CompanyName->Code;
      }
      // dd(config('database.connections.on_the_fly'));
      // \DB::setConnection('on_the_fly');

      $bambooBookingChannelCompany = CrChannel::with('empresa')->where('channel_code', $bookingChannel)->first();
      // $bambooBookingChannelCompany = CrChannel::where('channel_code', $bookingChannel)->first();
      // dd($bambooBookingChannelCompany->toArray());

      $bambooTipseg = null;
      $bambooTipres = null;
      $bambooCodcan = null;

      if ($bambooBookingChannelCompany) {
        $bambooBookingChannelCompany = $bambooBookingChannelCompany->toArray();
        $bambooCompanyNit = $bambooBookingChannelCompany['empresa']['nit'];
        $bambooTipseg = $bambooBookingChannelCompany['tipseg'] ? $bambooBookingChannelCompany['tipseg'] : 'I';
        $bambooTipres = $bambooBookingChannelCompany['tipres'];
        $bambooCodcan = $bambooBookingChannelCompany['codcan'];
      }

      // dd($bambooCodcan, $bambooTipres, $bambooTipseg, $bambooCompanyNit, $bambooBookingChannelCompany);

      foreach ($data->HotelReservations->HotelReservation->ResGuests->ResGuest as $guest) {

        foreach ($guest->Profiles as $profile) {

          if ($profile->Profile->ProfileType == 1) {

            if (
              !isset($profile->Profile->Customer->Email) ||
              $profile->Profile->Customer->Email == '' ||
              !filter_var($profile->Profile->Customer->Email, FILTER_VALIDATE_EMAIL)
            ) {

              $profile->Profile->Customer->Email = str_random(14) . '@email.com';
            }

            $resGuest = $profile->Profile->Customer;

            // dd($resGuest->Email);

            $guestExits = Cliente::where('email', $resGuest->Email)->first();

            // dd($resGuest->Email, $guestExits->toArray());

            if (!$guestExits) {

              $cedula = str_random(14);

              try {

                $client = [
                  'cedula' => $cedula,
                  'tipdoc' => 1,
                  'nombre' => $resGuest->PersonName->GivenName . ' ' . $resGuest->PersonName->Surname,
                  'telefono1' => $resGuest->Telephone->PhoneNumber ? $resGuest->Telephone->PhoneNumber : '123456',
                  'email' => $resGuest->Email,
                  'primer_nombre' => $resGuest->PersonName->GivenName,
                  'primer_apellido' => $resGuest->PersonName->Surname,
                  'emailfe' => $resGuest->Email,
                  'ciudades_dian' => 149
                ];

                $guestExits = Cliente::create($client);

              } catch (\Exception $exception) {
                echo $exception->getMessage();
                die;
              }


            }

          }
          if ($guest->Profiles->ProfileInfo->Profile->ProfileType == 18) {

            // dd($guest->Profiles->ProfileInfo->Profile->Customer->Email);
            if (
              !isset($guest->Profiles->ProfileInfo->Profile->Customer->Email) ||
              $guest->Profiles->ProfileInfo->Profile->Customer->Email == '' ||
              !filter_var($guest->Profiles->ProfileInfo->Profile->Customer->Email, FILTER_VALIDATE_EMAIL)
            ) {

              $guest->Profiles->ProfileInfo->Profile->Customer->Email = str_random(14) . '@email.com';
            }
            $booker = $guest->Profiles->ProfileInfo->Profile->Customer;

            $bookerOr = $guest->Profiles->ProfileInfo->Profile->Customer;

            // dd($guest->Profiles->ProfileInfo);
            $bookerExists = CrBooker::where('email', $booker->Email)->first();

            if (!$bookerExists) {
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

              } catch (\Exception $exception) {
                echo $exception->getMessage();
                die;
              }
            }

            if ($bookerExists) {
              $booker = $bookerExists;
            }
          }
          if ($guest->Profiles->ProfileInfo->Profile->ProfileType == 3) {
            $company = [
              'id' => $guest->Profiles->ProfileInfo->UniqueID->ID,
              'name' => $guest->Profiles->ProfileInfo->Profile->CompanyInfo->CompanyName
            ];
          }
        }

      }

      if (!is_array($data->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
        $data->HotelReservations->HotelReservation->RoomStays->RoomStay = [
          $data->HotelReservations->HotelReservation->RoomStays->RoomStay
        ];
      }

      $availables = [];

      $selectedRooms = [];

      foreach ($data->HotelReservations->HotelReservation->RoomStays->RoomStay as $roomStay) {
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

      if (count($availables) < count($data->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
        return $this->getReservationError(['noAvailabilities']);
      }
      $tipDoc = Tipdoc::where('detalle', 'CEDULA CIUDADANIA')->first();
      $confirmationid = $this->uniqidReal(16);
      $guaranteeText = "";

      $roomStayCnt = 0;
      foreach ($data->HotelReservations->HotelReservation->RoomStays->RoomStay as $roomStay) {

        $guarantee = null;

        if (
          isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Guarantee)
        ) {

          $guarantee = $data->HotelReservations->HotelReservation->ResGlobalInfo->Guarantee;
          $guaranteesAccepted = [];

          if (isset($guarantee->GuaranteesAccepted)) {
            $guaranteeText .= json_encode($guarantee->GuaranteesAccepted, true);
          }
        }

        if (isset($data->HotelReservations->HotelReservation->ResGlobalInfo->EncodedCCInfo)) {
          $guaranteeText .= $data->HotelReservations->HotelReservation->ResGlobalInfo->EncodedCCInfo;
        }

        $numadu = 0;
        $numnin = 0;

        if (isset($roomStay->GuestCounts)) {
          if (is_array($roomStay->GuestCounts->GuestCount)) {
            foreach ($roomStay->GuestCounts->GuestCount as $guestCount) {
              if (isset($guestCount->AgeQualifyingCode) && $guestCount->AgeQualifyingCode == "10") {
                $numadu = $guestCount->Count;
              }

              if (isset($guestCount->AgeQualifyingCode) && $guestCount->AgeQualifyingCode == "8") {
                $numnin = $guestCount->Count;
              }
            }
          } else {
            if (isset($roomStay->GuestCounts->GuestCount->AgeQualifyingCode) && $roomStay->GuestCounts->GuestCount->AgeQualifyingCode == "10") {
              $numadu = $roomStay->GuestCounts->GuestCount->Count;
            }

            if (isset($roomStay->GuestCounts->GuestCount->AgeQualifyingCode) && $roomStay->GuestCounts->GuestCount->AgeQualifyingCode == "8") {
              $numnin = $roomStay->GuestCounts->GuestCount->Count;
            }
          }

        }

        // dd($numadu, $numnin);

        $roomClass = config('rategain.rooms_cl.' . $roomStay->RoomRates->RoomRate->RoomTypeCode);
        $numres = collect(\DB::connection('on_the_fly')->select('select MAX(numres)+1 as res from reserva limit 1'))->first();
        $dathot = collect(\DB::connection('on_the_fly')->select("select nit, numrec from dathot;"))->first();
        $numres = $numres->res;
        $nit = explode('.', $dathot->nit);
        $nit = implode('', $nit);
        $nit = explode('-', $nit);
        $nit = $nit[0];
        $numrec = $dathot->numrec;
        $numhab = $selectedRooms[$roomStayCnt]->numhab;

        $observacion = $resGuest ? "
{$resGuest->PersonName->GivenName} {$resGuest->PersonName->Surname}
{$resGuest->Telephone->PhoneNumber}
{$resGuest->Email}

RateGain {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type} {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value}
RateGain {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type} {$data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value}
            " : '';
        $paymentType = config('rategain.paymentType');
        $warrantyType = config('rategain.warrantyType');
        $programType = config('rategain.programType');
        $tipres = config('rategain.tipres');
        $metadata = json_encode($data);

        try {
          Reserva::create([
            'numres' => $numres,
            'referencia' => 'RateGain ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $data->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
            'tipdoc' => $guestExits ? $guestExits->tipdoc : 1,
            'cedula' => $guestExits ? $guestExits->cedula : $cedula,
            'nit' => $bambooCompanyNit ? $bambooCompanyNit : 0, // $nit,
            'nitage' => $bambooCompanyNit ? $bambooCompanyNit : 0,
            'numhab' => $numhab,
            'tipres' => $bambooTipres ? $bambooTipres : $tipres,
            'tipseg' => $bambooTipseg ? $bambooTipseg : 'I',
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
            'tippro' => null,
            'tipgar' => null,
            'codven' => null,
            'codcan' => $bambooCodcan ? $bambooCodcan : 0,
            'metadata' => $metadata,
            'guarantee' => ' ' . $guaranteeText,
            'confirmationid' => $confirmationid,
            'onlinecomment' => (
              isset($roomStay->Comments) ?
                '' . (is_array($roomStay->Comments->Comment) ?
                  json_encode($roomStay->Comments->Comment) :
                  $roomStay->Comments->Comment->Text) :
                '') . (
                  $company ?
                    "\n" . $company['name'] . " - " . $company['id'] :
                    "\n"
                ) . (
              isset($roomStay->SpecialRequests) ?
                '' . (is_array($roomStay->SpecialRequests->SpecialRequest) ?
                  json_encode($roomStay->SpecialRequests->SpecialRequest) :
                  $roomStay->SpecialRequests->SpecialRequest) :
                "\n"
              ),
            'cancellationid' => null,
            'rateplanname' => null,
            'rateplancode' => isset($roomStay->RatePlans->RatePlan->RatePlanCode) ? $roomStay->RatePlans->RatePlan->RatePlanCode : '',
            'idclifre' => $booker ? ($booker->givenname . ' ' . $booker->surname . ' - ' . $booker->email) : "{$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->GivenName} {$data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->Surname}",
          ]);
        } catch (\Exception $exception) {
          dd($exception->getMessage());
        }
        $amount = 0;

        if ($booker) {
          CrBookerReserva::create([
            'booker_id' => $booker->id,
            'numres' => $numres,
            'amount' => isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax) ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax : $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax,
            'date' => date('Y-m-d H:i:s'),
            'booker_name' => $booker->givenname . ' ' . $booker->surname,
          ]);
        }

        if ($guarantee && isset($guarantee->GuaranteesAccepted)) {
          CrGuarantee::create([
            'type' => $guarantee->GuaranteeType,
            'code' => isset($guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardCode) ? $guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardCode : '',
            'number' => isset($guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardNumber) ? $guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardNumber : '',
            'expire' => isset($guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->ExpireDate) ? $guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->ExpireDate : '',
            'holder' => isset($guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardHolderName) ? $guarantee->GuaranteesAccepted->GuaranteeAccepted->PaymentCard->CardHolderName : '',
            'amount' => isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax) ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax : $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax,
            'currency' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->CurrencyCode,
            'numres' => $numres
          ]);
        }

        if ($guarantee && isset($guarantee->GuaranteeCode)) {
          CrGuarantee::create([
            'type' => null,
            'code' => $guarantee->GuaranteeCode,
            'number' => null,
            'expire' => null,
            'holder' => null,
            'amount' => isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax) ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax : $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax,
            'currency' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->CurrencyCode,
            'numres' => $numres
          ]);
        }

        $codpla = config('rategain.codpla');
        $dayPriceCnt = 1;

        // dd($roomStay->RoomRates->RoomRate->Rates->Rate);

        $amountBT = 0;
        $amountAT = 0;
        $amount = 0;


        if (is_array($roomStay->RoomRates->RoomRate->Rates->Rate)) {


          foreach ($roomStay->RoomRates->RoomRate->Rates->Rate as $dayPrice) {

            $amountBT = isset($dayPrice->Base->AmountBeforeTax) ? $dayPrice->Base->AmountBeforeTax : 0;
            $amountAT = isset($dayPrice->Base->AmountAfterTax) ? $dayPrice->Base->AmountAfterTax : 0;

            $amount = $amountBT ? $amountBT : $amountAT;

            $value = $amount;

            if (isset($dayPrice->Base->CurrencyCode) && $dayPrice->Base->CurrencyCode && $dayPrice->Base->CurrencyCode === 'USD') {
              $usd = Valmon::orderBy('fecha', 'DESC')->first();
              $value = $value * $usd->valor;
            }

            try {
              Plares::create([
                'numres' => $numres,
                'numpla' => $dayPriceCnt,
                'codpla' => $codpla,
                'fecini' => $dayPrice->EffectiveDate,
                'fecfin' => $dayPrice->ExpireDate,
                'pordes' => 0,
                'tipdes' => 'P',
                // 'subsidio' => null,
                // 'valor' => 0,
                'valornoche' => $value,
                'codigocr' => $roomStay->RoomRates->RoomRate->RatePlanCode
              ]);
              $dayPriceCnt++;

            } catch (Exception $exception) {
              dd($exception->getMessage());
            }
          }
        } else {
          $amountBT = isset($roomStay->RoomRates->RoomRate->Rates->Rate->Base->AmountBeforeTax) ? $roomStay->RoomRates->RoomRate->Rates->Rate->Base->AmountBeforeTax : 0;
          $amountAT = isset($roomStay->RoomRates->RoomRate->Rates->Rate->Base->AmountAfterTax) ? $roomStay->RoomRates->RoomRate->Rates->Rate->Base->AmountAfterTax : 0;
          $amount = $amountBT ? $amountBT : $amountAT;
          $value = $amount;

          if (isset($dayPrice->Base->CurrencyCode) && $dayPrice->Base->CurrencyCode && $dayPrice->Base->CurrencyCode === 'USD') {
            $usd = Valmon::orderBy('fecha', 'DESC')->first();
            $value = $value * $usd->valor;
          }
          try {
            Plares::create([
              'numres' => $numres,
              'numpla' => $dayPriceCnt,
              'codpla' => $codpla,
              'fecini' => $roomStay->RoomRates->RoomRate->Rates->Rate->EffectiveDate,
              'fecfin' => $roomStay->RoomRates->RoomRate->Rates->Rate->ExpireDate,
              'pordes' => 0,
              'tipdes' => 'P',
              // 'subsidio' => null,
              // 'valor' => 0,
              'valornoche' => $value,
              'codigocr' => $roomStay->RoomRates->RoomRate->RatePlanCode
            ]);
            $dayPriceCnt++;

          } catch (Exception $exception) {
            dd($exception->getMessage());
          }
        }

        $address = '';

        $address .= json_encode($data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Address, true);

        try {

          $phone = '';

          if (isset($data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Telephone->PhoneNumber)) {
            $phone = $data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->Telephone->PhoneNumber;
          }

          /*Reccaj::create([
                    'numrec' => $numrec,
                    'codcaj' => 1,
                    'codusu' => 1,
                    'codcar',
                    'codven',
                    'cedula' => $cedula,
                    'nombre' => $data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->GivenName. ' ' . $data->HotelReservations->HotelReservation->ResGuests->ResGuest[0]->Profiles->ProfileInfo->Profile->Customer->PersonName->Surname,
                    'direccion' => $address,
                    'ciudad' => 'NA',
                    'telefono' => $phone,
                    'fecha' => date('Y-m-d'),
                    'codcaj',
                    'codusu',
                    'codcar' => 54,
                    'codven' => 0,
                    'nota' => 'Pago de reserva por RateGain.',
                    'estado' => 'A'
                ]);*/

        } catch (Exception $exception) {
          dd($exception->getMessage());
        }

        try {

          $valor = 0;

          if (isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax)) {
            $valor = $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax;
          }

          if (isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax)) {
            $valor = $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax;
          }

          /*Detrec::create([
                    'numrec' => $numrec,
                    'numero' => 1,
                    'forpag' => 1,
                    'numfor' => 0,
                    'fecven' => date('Y-m-d'),
                    'ivarep' => 0,
                    'valorm' => 0,
                    'valor' => $valor
                ]);*/

        } catch (Exception $exception) {
          dd($exception->getMessage());
        }

        try {

          /*Garres::create([
                    'numres' => $numres,
                    'item' => 1,
                    'codusu' => 1,
                    'codcaj' => 1,
                    'fecha' => date('Y-m-d'),
                    'codcar' => 54,
                    'total' => $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax: $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax,
                    'numrec' => $numrec,
                    'numegr' => 0,
                    'estado' => 'A'
                ]);*/

        } catch (Exception $exception) {
          dd($exception->getMessage());
        }

        $nNumrec = ($numrec + 1);

        try {

          /*$dathot = Dathot::first();

            $dathot->update([
            'numrec' => $nNumrec
         ]);*/

        } catch (Exception $exception) {
          dd($exception->getMessage());
        }

        $queryNumfolio = "select MAX(numfol)+1 as fol from folio";

        $numfolio = collect(\DB::connection('on_the_fly')->select($queryNumfolio))->first();
        $resDate = substr($data->TimeStamp, 0, 10);

        try {

          Folio::create([
            'numfol' => $numfolio->fol,
            'numres' => $numres,
            'codeve' => 0,
            'tipdoc' => $tipDoc->tipdoc,
            'cedula' => $cedula,
            'nit' => '0',
            'nitage' => '0',
            'locpro' => 127591,
            'codpai' => null,
            'codciu' => null,
            'paides' => null,
            'locdes' => 129499,
            'ciudes' => null,
            'codtra' => 0,
            'trasal' => 0,
            'codmot' => null,
            'numhab' => $numhab,
            'usuout' => null,
            'codusu' => null,
            'fecres' => $resDate,
            'feclle' => $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->Start,
            'fecsal' => $data->HotelReservations->HotelReservation->ResGlobalInfo->TimeSpan->End,
            'hora' => null,
            'horsal' => null,
            'numadu' => $numadu,
            'numnin' => $numnin,
            'numinf' => 0,
            'nota' => 'FOLIO CREADO PARA RESERVA EN LINEA RateGain',
            'notaayb' => '',
            'equipaje' => 'N',
            'placa' => null,
            'trahot' => 'N',
            'estpai' => null,
            'corregir' => 'N',
            'forpag' => null,
            'estado' => 'O',
            'walkin' => 'A',
            'tippro' => '',
            'tipgar' => '',
            'codven' => 0,
            'idresweb' => null,
            'idcanal' => null,
            'idclifre' => null,
            'firma' => null,
            'comentario_en_linea' => (
              isset($roomStay->Comments) ?
                '' . (is_array($roomStay->Comments->Comment) ?
                  json_encode($roomStay->Comments->Comment) :
                  $roomStay->Comments->Comment->Text) :
                '') . (
              $company ?
                "\n" . $company['name'] . " - " . $company['id'] :
                "\n"
              ) . (
              isset($roomStay->SpecialRequests) ?
                '' . (is_array($roomStay->SpecialRequests->SpecialRequest) ?
                  json_encode($roomStay->SpecialRequests->SpecialRequest) :
                  $roomStay->SpecialRequests->SpecialRequest) :
                "\n"
              )
          ]);

        } catch (Exception $exception) {
          dd($exception->getMessage());
        }

        $amountBT = isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax) ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountBeforeTax : 0;
        $amountAT = isset($data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax) ? $data->HotelReservations->HotelReservation->ResGlobalInfo->Total->AmountAfterTax : 0;

        $amount = $amountBT ? $amountBT : $amountAT;

        try {

          /*Valcar::create([
                    'numfol' => $numfolio->fol,
                    'numcue' => 1,
                    'item' => 1,
                    'codusu' => 3,
                    'codcaj' => 7,
                    'fecha' => date('Y-m-d'),
                    'cantidad' => 1,
                    'codcar' => 54,
                    'cladoc' => 'RC',
                    'numdoc' => $numrec,
                    'codpla' => null,
                    'valor' => $amount,
                    'iva' => 0,
                    'impo' => null,
                    'valser' => 0,
                    'valter' => 0,
                    'total' => $amount,
                    'estado' => 'A',
                    'oldfol' => null,
                    'movcor' => 'N',
                    // 'subsidio' => null
                ]);*/

        } catch (Exception $exception) {
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
        'rategain',
        $data->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode
      )
      );

      dispatch($job);

      return $returnSuccess;

    }

  }
