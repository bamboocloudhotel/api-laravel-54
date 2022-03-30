<?php

namespace App\Console\Commands;

use App\BambooInstance;
use App\InventoryUpdate;
use Carbon\CarbonPeriod;
use Illuminate\Console\Command;

class UpdateTodayInventoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rategain:update_today_inventory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all instances inventory for today date';

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
            /*if ($instance->rg_hotel_code  !== 'bhbicentenario') {
                continue;
            }*/
            $d1 = new \DateTime();

            echo "START " . $instance->rg_hotel_code . "\n";

            \Illuminate\Support\Facades\Log::info("START " . $instance->rg_hotel_code . " at " . $d1->format('Y-m-d H:i:s'));

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

            // $config = $this->setRateGainConfig($instance->rg_hotel_code);

            // if ($config) {

            $period = CarbonPeriod::create(date('Y-m-d'), date('Y-m-d', strtotime("+90 days")));

            $thisXml = str_replace('HotelCode="xxxxx"', 'HotelCode="' . $instance->rg_hotel_code . '"', $xml);

            $thisItems = '';

            /*foreach ($period as $date) {*/
                $thisDate = date('Y-m-d');
                $tomorrow = date('Y-m-d', strtotime($thisDate . " +1 days"));

                foreach ($instance->bambooInstanceRooms as $room) {
                    $availability = $this->getAvailability($instance->rg_hotel_code, $thisDate, $tomorrow, $room->bb_room);

                    $thisItemXml = str_replace('BookingLimit="1"', 'BookingLimit="' . $availability . '"', $inventoryModifyRequestItem);
                    $thisItemXml = str_replace('Start="2020-03-01"', 'Start="' . $thisDate . '"', $thisItemXml);
                    $thisItemXml = str_replace('End="2020-03-01"', 'End="' . $thisDate . '"', $thisItemXml);
                    $thisItemXml = str_replace('InvCode="SGL"', 'InvCode="' . $room['rg_room'] . '"', $thisItemXml);
                    $thisItemXml = str_replace('ID="1"', 'ID="' . $this->uniqidReal() . '"', $thisItemXml);

                    $thisItems = $thisItems . "\n" . $thisItemXml;

                }
//            }
            // }

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

            // echo $data . "\n";

            $d2 = new \DateTime();

            InventoryUpdate::insert([
                'booking_engine' => 'rategain',
                'room_class_cloud' => null,
                'room_class_local' => null,
                'date_updated' => $d2->format('Y-m-d H:i:s'),
                'quantity' => null,
                'xml' => $data,
                'hotel' => $instance->rg_hotel_code,
                'xml_request' => $xml,
                'source' => null
            ]);

            $interval = $d1->diff($d2);

            echo "END " . $instance->rg_hotel_code . " in " . $interval->s . " seconds\n\n";

            \Illuminate\Support\Facades\Log::info("END " . $instance->rg_hotel_code . " at " . $d2->format('Y-m-d H:i:s') . " in " . $interval->s . " seconds");

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

    private function getAvailability($rg_hotel_code, $start, $end, $codcla)
    {
        $this->setRateGainConfig($rg_hotel_code);

        $sql = "
        SELECT blohab.numhab
        FROM blohab
        LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
        WHERE blohab.fecini <= '{$end}' AND blohab.fecfin >= '{$start}'
        AND blohab.fecdes IS NULL
        AND habitacion.codcla = {$codcla}
        AND habitacion.tipo = 'V'
        ";

        $roomsBlocked = collect(\DB::connection('on_the_fly')->select($sql));

        foreach ($roomsBlocked as $roomBlocked) {
            $roomsOccupied[] = $roomBlocked->numhab;
        }

        $sql = "
        SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
        FROM `reserva`
        LEFT JOIN habitacion ON reserva.numhab = habitacion.numhab
        WHERE reserva.feclle <= '{$start}' AND reserva.fecsal >= '{$end}'
        AND reserva.estado IN ('P','G')
        AND habitacion.codcla = {$codcla}
        AND habitacion.tipo = 'V'
        ORDER BY reserva.numhab ASC
        ";

        $roomsReserved = collect(\DB::connection('on_the_fly')->select($sql));

        foreach ($roomsReserved as $roomReserved) {
            $roomsOccupied[] = $roomReserved->numhab;
        }

        $sql = "
        SELECT folio.numhab, folio.numres, folio.numfol, folio.estado
        FROM folio
        INNER JOIN habitacion ON folio.numhab = habitacion.numhab
        INNER JOIN reserva ON folio.numres = reserva.numres
        WHERE folio.feclle <= '{start}' AND folio.fecsal >= '{$end}'
        AND reserva.estado IN ('H')
        AND folio.estado IN ('I')
        AND habitacion.codcla = {$codcla}
        AND habitacion.tipo = 'V'
        ORDER BY folio.numhab 
        ";

        $roomsHosted = collect(\DB::connection('on_the_fly')->select($sql));

        foreach ($roomsHosted as $roomHosted) {
            $roomsOccupied[] = $roomHosted->numhab;
        }

        $roomsOccupied = collect($roomsOccupied);

        $roomsOccupied = implode('\',\'', $roomsOccupied->sort()->unique()->values()->all());

        $sql = "
        select habitacion.numhab 
        from habitacion 
        where habitacion.numhab not in ('{$roomsOccupied}')
        AND habitacion.codcla = {$codcla}
        AND habitacion.tipo = 'V'
        ";

        $numhab = collect(\DB::connection('on_the_fly')->select($sql));

        $roomsAvailable = implode('\',\'', $numhab->pluck('numhab')->unique()->sort()->values()->all());

        \DB::disconnect('on_the_fly');

        return count($numhab->pluck('numhab'));

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
