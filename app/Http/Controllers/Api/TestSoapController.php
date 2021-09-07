<?php

namespace App\Http\Controllers\Api;

use App\BambooInstance;
use App\bookingEngine\bookingEngine;
use App\Jobs\ModifyBookingEngineInventory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\SoapController;
use DateInterval;
use DatePeriod;
use DateTime;
use App\InventoryUpdate;

class TestSoapController extends SoapController
{
    private $bookingEngine;

    public function __construct(Request $request)
    {
        if (!$request->bookingEngine) {
            die('El parametro bookingEngine debe estar presente!');
        }

        $class = 'App\\' . studly_case($request->bookingEngine) . '\\' . studly_case($request->bookingEngine);
        if (!class_exists($class)) {
            die("La clase {$class} no existe!");
        }

        $this->bookingEngine = new $class();
    }

    public function sendInventory($instance, $start, $end)
    {
        $instance = BambooInstance::where('rg_hotel_code', $instance)->with('bambooInstanceRooms')->first()->toArray();

        $return = [];

        if ($instance) {
            foreach ($instance['bamboo_instance_rooms'] as $room) {

                $resp = $this->bookingEngine->sendAvailability($start, $end, $room['bb_room']);

                $return[] = $resp;

                foreach ($resp as $res) {
                    InventoryUpdate::create([
                        'booking_engine' => 'rategain',
                        'room_class_cloud' => $room['rg_room'],
                        'room_class_local' => $room['bb_room'],
                        'date_updated' => $start,
                        'quantity' => $res['quantity'],
                        'xml' => $res['xml'],
                        'hotel' => $instance['name']
                    ]);
                }


            }

            return $return;
        }

        return response()->json([
            'message' => 'No se encontro la instancia!',
        ], 400);
    }

    /**
     * This method return the list of all hotels associated to an username/password.
     */
    public function getHotels()
    {
        $soapRequest = $this->bookingEngine->getHotels();

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
    }

    /**
     * It gives the list of rates for a selected hotel.
     */
    public function getRates($hotelId = null)
    {
        $soapRequest = $this->bookingEngine->getRates($hotelId);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
    }

    /**
     * It gives the list of rooms for a selected hotel.
     */
    public function getRooms($hotelId = null)
    {
        $soapRequest = $this->bookingEngine->getRooms($hotelId);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
    }

    /**
     * It gives the list of channels managed by RC for a selected hotel.
     */
    public function getPortals($hotelId = null)
    {
        $soapRequest = $this->bookingEngine->getPortals($hotelId);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
    }

    /**
     * IThe reservations function let the client retrieve reservations from the RoomCloud local database.
     */
    public function getReservations($startDate = null, $endDate = null, $hotelId = null, $dlm = false)
    {
        $soapRequest = $this->bookingEngine->getReservations($startDate, $endDate, $hotelId, $dlm);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
    }

    /**
     * The reservations function let the client retrieve reservations from the RoomCloud local database.
     */
    public function getAvailability($startDate = null, $endDate = null, $hotelId = null, $clahab = null)
    {

        if (!$hotelId) {
            return response()->json([
                'message' => 'La ID del hotel no es valida.'
            ]);
        }

        if ($hotelId) {
            $this->setRateGainConfig($hotelId);
        }

        $sDate = $startDate ? $startDate : date('Y-m-d');
        $eDate = $endDate ? $endDate : date('Y-m-d');

        $soapRequest = $this->bookingEngine->getAvailability($startDate, $endDate, $clahab);

        // dd($soapRequest);

        if ($soapRequest['error']) {
            return response()->json([
                'error' => $soapRequest['error']
            ], 400);
        }
        return response()->json([
            'data' => $soapRequest
        ]);
    }


    public function modifyInventory(Request $request)
    {
        $sDate = $request->startDate ? $request->startDate : date('Y-m-d');
        $eDate = $request->endDate ? $request->endDate : date('Y-m-d');
        $hotel = $request->hotelId ? $request->hotelId : config('cm_reservas.userName');
        $room = $request->roomId;
        $quantity = $request->quantity;

        $soapRequest = $this->bookingEngine->getAvailability($sDate, $eDate, $hotel, $room);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);

    }

    public function modifyInventoryByDatesAndRoom(Request $request, $startDate, $endDate, $roomTypeId, $oldStartDate = null, $oldEndDate = null)
    {
        // $typeRoom = config( snake_case(studly_case($request->bookingEngine)) . '.rooms_lc.' . $roomTypeId);

        if (!$request->get('hotelId')) {
            return response()->json([
                'message' => 'La ID del hotel no es valida.'
            ]);
        }

        if ($request->get('hotelId')) {
            $this->setRateGainConfig($request->get('hotelId'));
        }

        $typeRoom = config(snake_case(studly_case($request->bookingEngine)) . '.rooms_lc.' . $roomTypeId);

        $class = 'App\\' . studly_case($request->bookingEngine) . '\\' . studly_case($request->bookingEngine);
        $bookingEngine = new $class();

        if ($typeRoom) {
            $period = new \DatePeriod(
                new \DateTime($startDate),
                new \DateInterval('P1D'),
                new \DateTime($endDate)
            );

            $datesToCheck = [];

            foreach ($period as $key => $value) {
                $datesToCheck[] = $value->format('Y-m-d');
            }

            foreach ($datesToCheck as $dateToCheck) {
                $availability = $bookingEngine->getBambooQuantityAvailability($dateToCheck, $dateToCheck, $roomTypeId);
                $availability['date'] = $dateToCheck;
                $availabilities[] = $availability;
            }

            $modifies = [];

            foreach ($availabilities as $availability) {
                $modifies[] = $bookingEngine->modifyInventory(
                    $availability['date'],
                    $availability['date'],
                    $availability['class'],
                    $request->hotelId,
                    $availability['rooms']
                );
            }


            if ($request->bookingEngine == 'rategain') {
                foreach ($modifies as $modify) {
                    foreach ($modify as $mod) {
                        InventoryUpdate::create([
                            'booking_engine' => $mod['booking_engine'],
                            'room_class_cloud' => $mod['room'],
                            'room_class_local' => $roomTypeId,
                            'date_updated' => $mod['date'],
                            'quantity' => $mod['quantity'],
                            'xml' => $mod['xml'],
                            'hotel' => $request->get('hotelId'),
                        ]);
                    }
                }
            }

            return response()->json([
                'message' => 'OK',
                'data' => $modifies,
            ]);
        }

        return response()->json([
            'message' => 'Esta habitación no sincroniza inventario.'
        ]);

    }

    public function setRateGainConfig($rgHotelCode)
    {

        $instance = BambooInstance::with('bambooInstanceRooms')
            ->where(
                'rg_hotel_code', $rgHotelCode
            )->first();

        if (!$instance) {
            return response()->json([
                'message' => 'No se encontro la instancia'
            ], 400);
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
    }
}
