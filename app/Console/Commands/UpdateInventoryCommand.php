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
    protected $signature = 'rategain:update-inventory';

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

            $config = $this->setRateGainConfig($instance->rg_hotel_code);

            if ($config) {

                $period = CarbonPeriod::create(date('Y-m-d'), date('Y-m-d', strtotime("+30 days")));

                foreach ($period as $date) {
                    $thisDate = $date->format('Y-m-d');

                    foreach ($instance->bambooInstanceRooms as $room) {
                        $availability = $this->getAvailability($thisDate, date('Y-m-d', strtotime("+1 days")), $room->bb_room);

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

        }

        $fp = fopen(public_path('inventory.csv'), 'w');

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
}
