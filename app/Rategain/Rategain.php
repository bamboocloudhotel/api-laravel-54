<?php

namespace App\Rategain;

class Rategain
{

    public function __construct()
    {
    }


    public function modifyInventory($startDate = null, $endDate = null, $roomId = null, $hotelId = null, $quantity = null)
    {
        $hotelId = $hotelId ? $hotelId : config('rategain.hotelCode');
        $sDate = $startDate ? $startDate : date('Y-m-d');
        $eDate = $endDate ? $endDate : date('Y-m-d');
        $room = $roomId;

        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        $xml = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="{$currentDate}T{$currentTime}" Target="Production" Version="1.002" EchoToken="{$hotelId}">
	<AvailStatusMessages HotelCode="{$hotelId}">
		<AvailStatusMessage BookingLimit="1" BookingLimitMessageType="SetLimit">
			<StatusApplicationControl Start="2020-03-01" End="2020-03-01" InvCode="SGL"></StatusApplicationControl>
			<UniqueID Type="16" ID="1"></UniqueID>
		</AvailStatusMessage>
	</AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;

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
            $thisXml = str_replace('Start="2020-03-01"', 'Start="'.$date.'"', $thisXml);
            $thisXml = str_replace('End="2020-03-01"', 'End="'.$date.'"', $thisXml);
            $thisXml = str_replace('InvCode="SGL"', 'InvCode="' . $room . '"', $thisXml);
            $thisXml = str_replace('InvCode="SGL"', 'InvCode="' . $room . '"', $thisXml);
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
            preg_match_all("|\"><(.*)\s/></OTA_HotelAvailNotifRS>|U", $data, $matches);
            $return[] = [
                'room' => $room,
                'date' => $date,
                'quantity' => $quantity,
                'updated' => $matches[1][0],
                'booking_engine' => 'rategain',
                'xml' => $data,
            ];
        }

        return $return;
    }

    public function getBambooAvailability($reservationAttributes, $roomClass)
    {
        \DB::setDefaultConnection('hhotel5');
        $roomsOccupied = [];

        $roomsBlocked = collect(\DB::select("
                SELECT blohab.numhab
                FROM blohab
                INNER JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE blohab.fecini <= '$reservationAttributes->checkout' AND blohab.fecfin >= '$reservationAttributes->checkin'
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsBlocked as $roomBlocked) {
            $roomsOccupied[] = $roomBlocked->numhab;
        }

        $roomsReserved = collect(\DB::select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE reserva.feclle < '$reservationAttributes->checkout' AND reserva.fecsal > '$reservationAttributes->checkin'
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsReserved as $roomReserved) {
            $roomsOccupied[] = $roomReserved->numhab;
        }

        $roomsHosted = collect(\DB::select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla, folio.numfol, folio.estado
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                INNER JOIN folio ON reserva.numhab = folio.numres
                WHERE reserva.feclle < '$reservationAttributes->checkout' AND reserva.fecsal > '$reservationAttributes->checkin'
                AND reserva.estado IN ('H')
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$roomClass}
            "));

        foreach ($roomsHosted as $roomHosted) {
            $roomsOccupied[] = $roomHosted->numhab;
        }

        $roomsOccupied = implode('\',\'', $roomsOccupied);

        $numhab = collect(\DB::select("
            select habitacion.numhab 
            from habitacion 
            where habitacion.numhab not in ('{$roomsOccupied}')
            AND habitacion.codcla = {$roomClass}
            "))->first();

        return $numhab;
    }

    /**
     * @return mixed
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

    function uniqidReal($lenght = 13) {
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

}
