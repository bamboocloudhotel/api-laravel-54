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
Route::get('soap/cr-reservas/availability/{startDate?}/{endDate?}/{hotelId?}', 'Api\TestSoapController@getAvailability');
Route::get('soap/cr-reservas/modify-inventory/{startDate}/{endDate}/{roomTypeId}/{oldStartDate?}/{oldEndDate?}', 'Api\TestSoapController@modifyInventoryByDatesAndRoom');
Route::get('soap/cr-reservas/modify-inventory', 'Api\TestSoapController@modifyInventory');

Route::get('soap/bamboo/availability/{startDate?}/{endDate?}/{hotelId?}', 'Api\TestSoapController@getBambooQuantityAvailability');

Route::get('test/availabilities', function(Request $request) {
  dd($request->all());
});


