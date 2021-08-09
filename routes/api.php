<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Models\Dathot;
use App\Models\CrGuarantee;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('test', function(Request $request) {
	return response()->json([
        'message' => 'OK',
        'data' => $request->all()
    ], 200);
});

Route::post('view-guarantee', function (Request $request) {
	
	$xmlController = new \App\Http\Controllers\XMLController();

    if (!$request->get('hotelCode')) {
        return response()->json([
            'message' => 'Debe enviar el código del hotel!'
        ], 404);
    }

    $xmlController->getInstance($request->get('hotelCode'));

    $xmlController = new \App\Http\Controllers\XMLController();

    if (!$request->get('hotelCode')) {
        return response()->json([
            'message' => 'Debe enviar el código del hotel!'
        ], 404);
    }

    $xmlController->getInstance($request->get('hotelCode'));

    $dathot = Dathot::firstOrFail();

    if ($dathot->guarantee_password == $request->get('guarantee_password')) {

        $guarantee = CrGuarantee::where('numres', $request->get('numres'))->first();

        if (!$guarantee) {
            return response()->json([
                'message' => 'Reserva no valida'
            ], 422);
        }

        return response()->json([
            'message' => 'Garantia obtenida con éxito!',
            'data' => $guarantee->toArray()
        ], 200);
    }

    return response()->json([
        'message' => 'Clave no valida'
    ], 422);
});

Route::any('rgbridgeapi/push/receive', 'XMLController@index');

Route::get('radius/users', 'Api\FreeRadiusController@getUsers');
Route::get('radius/users/{username}', 'Api\FreeRadiusController@getUser');
Route::post('radius/users', 'Api\FreeRadiusController@addUser');
Route::post('radius/users/{username}/delete', 'Api\FreeRadiusController@removeUser');

Route::get('databases', 'Api\DatabasesController@index');
Route::post('databases', 'Api\DatabasesController@store');
Route::put('databases/{id}', 'Api\DatabasesController@update');

Route::get('soap/test', 'SoapTestController@show');
Route::get('soap/tests', 'SoapTestController@testing');

Route::get('soap/cr-reservas/hotels', 'Api\TestSoapController@getHotels');
Route::get('soap/cr-reservas/rates/{hotelId?}', 'Api\TestSoapController@getRates');
Route::get('soap/cr-reservas/rooms/{hotelId?}', 'Api\TestSoapController@getRooms');
Route::get('soap/cr-reservas/portals/{hotelId?}', 'Api\TestSoapController@getPortals');
Route::get('soap/cr-reservas/reservations/{startDate?}/{endDate?}/{hotelId?}/{dlm?}', 'Api\TestSoapController@getReservations');
Route::get('soap/cr-reservas/availability/{startDate?}/{endDate?}/{hotelId?}/{clahab?}', 'Api\TestSoapController@getAvailability');
Route::get('soap/cr-reservas/modify-inventory/{startDate}/{endDate}/{roomTypeId}/{oldStartDate?}/{oldEndDate?}', 'Api\TestSoapController@modifyInventoryByDatesAndRoom');
Route::get('soap/cr-reservas/modify-inventory', 'Api\TestSoapController@modifyInventory');

Route::get('soap/bamboo/availability/{startDate?}/{endDate?}/{hotelId?}', 'Api\TestSoapController@getBambooQuantityAvailability');

Route::get('test/availabilities', function(Request $request) {

  $testSoapController = new \App\Http\Controllers\Api\TestSoapController($request);

  $testSoapController->setRateGainConfig($request->get('hotelId'));

  $roomsBlocked = collect(\DB::connection('on_the_fly')->select("
                SELECT blohab.numhab
                FROM blohab
                LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
                WHERE blohab.fecini <= '{$request->get('end')}' AND blohab.fecfin >= '{$request->get('start')}'
                AND blohab.fecdes IS NULL
                AND habitacion.codcla = {$request->get('class')}
                AND habitacion.tipo = 'V'
            "));

  foreach ($roomsBlocked as $roomBlocked) {
    $roomsOccupied[] = $roomBlocked->numhab;
  }

  $roomsReserved = collect(\DB::connection('on_the_fly')->select("
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla
                FROM `reserva`
                LEFT JOIN habitacion ON reserva.numhab = habitacion.numhab
                WHERE reserva.feclle >= '{$request->get('start')}' AND reserva.fecsal <= '{$request->get('end')}'
                AND reserva.estado IN ('P','G')
                AND habitacion.codcla = {$request->get('class')}
                AND habitacion.tipo = 'V'
                ORDER BY reserva.numhab ASC
            "));

  foreach ($roomsReserved as $roomReserved) {
    $roomsOccupied[] = $roomReserved->numhab;
  }

  $sql = "
                SELECT reserva.numres, reserva.numhab, reserva.estado, habitacion.codcla, folio.numfol, folio.estado
                FROM `reserva`
                INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
                INNER JOIN folio ON reserva.numres = folio.numres
                WHERE reserva.feclle <= '{$request->get('end')}' AND reserva.fecsal >= '{$request->get('start')}'
                AND reserva.estado IN ('H')
                AND folio.estado IN ('I')
                AND habitacion.codcla = {$request->get('class')}
                AND habitacion.tipo = 'V'
            ";

  $roomsHosted = collect(\DB::connection('on_the_fly')->select($sql));

  foreach ($roomsHosted as $roomHosted) {
    $roomsOccupied[] = $roomHosted->numhab;
  }

  $roomsOccupied = collect($roomsOccupied);


  $roomsOccupied = implode('\',\'', $roomsOccupied->sort()->values()->all());

  $numhab = collect(\DB::connection('on_the_fly')->select("
            select habitacion.numhab 
            from habitacion 
            where habitacion.numhab not in ('{$roomsOccupied}')
            AND habitacion.codcla = {$request->get('class')}
            AND habitacion.tipo = 'V'
            "));

  dd($roomsBlocked, $roomsReserved, $roomsHosted, $roomsOccupied, $numhab->toArray());
});


