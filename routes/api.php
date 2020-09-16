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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('test', function() {
	echo 'Hello!';
});

Route::post('rgbridgeapi/push/receive', 'XMLController@index');

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


