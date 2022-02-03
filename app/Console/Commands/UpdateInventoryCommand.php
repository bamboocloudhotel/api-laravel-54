<?php

namespace App\Console\Commands;

use App\BambooInstance;
use App\Models\Log;
use Carbon\CarbonPeriod;
use Illuminate\Console\Command;

class UpdateInventoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rategain:update_inventory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all instances inventory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        $instances = BambooInstance::with('bambooInstanceRooms')->get();

        foreach ($instances as $instance) {

            $currentDate = date('Y-m-d');
            $currentTime = date('H:i:s');

            $inventoryModifyRequest = <<<XML
<OTA_HotelAvailNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05" TimeStamp="{$currentDate}T{$currentTime}" Target="Production" Version="1.002" EchoToken="{$this->uniqidReal()}">
	<AvailStatusMessages HotelCode="xxxxx">
		<AvailStatusMessage></AvailStatusMessage>
	</AvailStatusMessages>
</OTA_HotelAvailNotifRQ>
XML;

            $inventoryModifyRequestItem = <<<XML
<AvailStatusMessage BookingLimit="1" BookingLimitMessageType="SetLimit">
    <StatusApplicationControl Start="2020-03-01" End="2020-03-01" InvCode="SGL"></StatusApplicationControl>
    <UniqueID Type="16" ID="1"></UniqueID>
</AvailStatusMessage>
XML;

            $xml = $inventoryModifyRequest;

            $config = $this->setRateGainConfig($instance->rg_hotel_code);

            if ($config) {

                $period = CarbonPeriod::create(date('Y-m-d'), date('Y-m-d', strtotime("+90 days")));

                $thisXml = str_replace('HotelCode="xxxxx"', 'HotelCode="' . $instance->rg_hotel_code . '"', $xml);

                $thisItems = '';

                foreach ($period as $date) {
                    $thisDate = $date->format('Y-m-d');

                    foreach ($instance->bambooInstanceRooms as $room) {
                        $availability = $this->getAvailability($thisDate, date('Y-m-d', strtotime("+1 days")), $room->bb_room);

                        $thisItemXml = str_replace('BookingLimit="1"', 'BookingLimit="' . $availability . '"', $inventoryModifyRequestItem);
                        $thisItemXml = str_replace('Start="2020-03-01"', 'Start="' . $date . '"', $thisItemXml);
                        $thisItemXml = str_replace('End="2020-03-01"', 'End="' . $date . '"', $thisItemXml);
                        $thisItemXml = str_replace('InvCode="SGL"', 'InvCode="' . $room['rg_room'] . '"', $thisItemXml);
                        $thisItemXml = str_replace('ID="1"', 'ID="' . $this->uniqidReal() . '"', $thisItemXml);

                        $thisItems = $thisItems . "\n" . $thisItemXml;

                    }
                }
            }

            $xml = str_replace('<AvailStatusMessage></AvailStatusMessage>', $thisItems, $thisXml);

            // echo $xml . "\n";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERPWD, config('rategain.username') . ":" . config('rategain.password'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_URL, config('rategain.url'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            $data = curl_exec($ch);
            curl_close($ch);

            // dd($data, $thisXml);

            preg_match_all("|\"><(.*)\s/></OTA_HotelAvailNotifRS>|U", $data, $matches);

            // dd($data);

            /*$return = [
                'room' => $room,
                'date' => $date,
                'quantity' => $availability,
                'updated' => isset($matches[1][0]) ? $matches[1][0] : 'Undefined',
                'booking_engine' => 'rategain',
                'xml' => $data,
            ];

            dd($return);*/

            echo $data . "\n";

        }



    }

    private function setRateGainConfig($rgHotelCode)
    {

        $instance = BambooInstance::with('bambooInstanceRooms')
            ->where(
                'rg_hotel_code', $rgHotelCode
            )->first();

        if (!$instance) {

            // ToDo: log this

            return false;
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
            'url' => $instance['rg_api'],
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

        return true;
    }

    private function getAvailability($start, $end, $codcla)
    {
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

        return $roomsAvailable->pluck('numhab')->count();

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
}
