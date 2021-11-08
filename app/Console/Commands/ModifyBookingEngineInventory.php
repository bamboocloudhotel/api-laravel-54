<?php

namespace App\Console\Commands;

use App\BambooInstance;
use App\InventoryUpdate;
use Illuminate\Console\Command;

class ModifyBookingEngineInventory extends Command
{
    private $bookingEngine;
    private $hotelId;
    private $startDate;
    private $endDate;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cr:put_inventory
                            {start-date : Fecha inicial}
                            {end-date : Fecha final}
                            {room-class : Id de la clase de habitación}
                            {booking-engine : Código del motor de reservas.}
                            {hotel-code? : Código del hotel (rategain).}';

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
        $class = 'App\\Rategain\\Rategain';
        //
        $instance = BambooInstance::where('rg_hotel_code', $this->hotelId)->with('bambooInstanceRooms')->first()->toArray();

        $return = [];

        if ($instance) {
            foreach ($instance['bamboo_instance_rooms'] as $room) {

                $resp = $this->bookingEngine->sendAvailability($this->startDate, $this->endDate, $room['bb_room'], $room['rg_room'], $instance['rg_hotel_code']);

                $return[] = $resp;

                foreach ($resp as $res) {
                    InventoryUpdate::create([
                        'booking_engine' => 'rategain',
                        'room_class_cloud' => $room['rg_room'],
                        'room_class_local' => $room['bb_room'],
                        'date_updated' => $res['date'],
                        'quantity' => $res['quantity'],
                        'xml' => $res['xml'],
                        'hotel' => $instance['name'],
                        'xml_request' => $res['request']
                    ]);
                }
            }
        }
    }

    public function setRateGainConfig($rgHotelCode)
    {
        $instance = BambooInstance::with('bambooInstanceRooms')
            ->where(
                'rg_hotel_code', $rgHotelCode
            )->first()
            ->toArray();

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
    }
}
