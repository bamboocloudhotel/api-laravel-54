<?php

namespace App\Http\Controllers\Api;

use App\bookingEngine\bookingEngine;
use App\Jobs\ModifyBookingEngineInventory;
use Illuminate\Http\Request;
use App\Http\Controllers\SoapController;
use DateInterval;
use DatePeriod;
use DateTime;

class TestSoapController extends SoapController
{
    private $bookingEngine;

    public function __construct(Request $request)
    {
        if(!$request->bookingEngine) {
            die('El parametro bookingEngine debe estar presente!');
        }

        $class = 'App\\' . studly_case($request->bookingEngine) . '\\' . studly_case($request->bookingEngine);
        if (!class_exists($class)) {
            die("La clase {$class} no existe!");
        }

        $this->bookingEngine = new $class();
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
    public function getAvailability($startDate = null, $endDate = null, $hotelId = null)
    {
        $sDate = $startDate ? $startDate : date('Y-m-d');
        $eDate = $endDate ? $endDate : date('Y-m-d');

        $soapRequest = $this->bookingEngine->getAvailability($startDate, $endDate, $hotelId);

        if ($soapRequest['error']) {
            return response()->json($soapRequest['data'], 400);
        }
        return response()->json($soapRequest['data']);
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
        $typeRoom = config( snake_case(studly_case($request->bookingEngine)) . '.rooms_lc.' . $roomTypeId);

        if ($typeRoom) {

            $job = (
                new ModifyBookingEngineInventory($startDate, $endDate, $roomTypeId, $request->bookingEngine)
            );

            $this->dispatch($job);

            return response()->json([
                'message' => 'OK',
                'data' => null
            ]);
        }

        return response()->json([
            'message' => 'Esta habitación no sincroniza inventario.'
        ]);

    }
}
