<?php

namespace App\Console\Commands;

use App\BambooInstance;
use Carbon\CarbonPeriod;
use Illuminate\Console\Command;

class UpdatePreview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rategain:update_preview';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $rows = [];

        $cnt = 0;

        $rows[$cnt] = [
            'fecha',
            'hotel',
            'hab bamboo',
            'hab rategain',
            'disponibilidad'
        ];

        $cnt++;

        foreach ($instances as $instance) {

            /*$config = $this->setRateGainConfig($instance->rg_hotel_code);

            if ($config) {*/

                $period = CarbonPeriod::create(date('Y-m-d'), date('Y-m-d', strtotime("+5 days")));

                foreach ($period as $date) {
                    $thisDate = $date->format('Y-m-d');

                    foreach ($instance->bambooInstanceRooms as $room) {
                        $availability = $this->getAvailability($instance->rg_hotel_code, $thisDate, date('Y-m-d', strtotime($thisDate . " +1 days")), $room->bb_room);

                        echo \Config::get("database.connections.on_the_fly.host") . ' -> ' . \Config::get("database.connections.on_the_fly.database") . ' -> ' . $thisDate . ' ' . date('Y-m-d', strtotime($thisDate . " +1 days")) . ": " . $room->bb_room . " -> " . $availability . "\n";

                        $rows[$cnt] = [
                            $thisDate,
                            $instance->rg_hotel_code,
                            $room->bb_room,
                            $room->rg_room,
                            $availability
                        ];

                        $cnt++;

                    }
                }
            }

        // }

        $time = time();

        $fp = fopen(public_path('inventory_'.$time.'.csv'), 'w');

        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }

        fclose($fp);

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
            "port" => 3306,
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
