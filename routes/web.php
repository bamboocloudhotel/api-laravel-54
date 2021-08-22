<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);

Route::get('/rategain-requests', 'RategainRequestController@index')->middleware('auth');
Route::get('/rategain-requests/{id}', 'RategainRequestController@show')->middleware('auth');
Route::get('/rategain-inventory-updates', 'InventoryUpdateController@index')->middleware('auth');
Route::get('/rategain-inventory-updates/{id}', 'InventoryUpdateController@show')->middleware('auth');
Route::get('/rategain-bamboo-instances', 'BambooInstancesController@index')->middleware('auth');
Route::get('/rategain-bamboo-instances/{id}', 'BambooInstancesController@show')->middleware('auth');
Route::post('/rategain-bamboo-instances', 'BambooInstancesController@store')->middleware('auth');
Route::post('/rategain-bamboo-instances/{id}', 'BambooInstancesController@update')->middleware('auth');
Route::get('/rategain-availability', 'AvailabilityController@index')->middleware('auth');
Route::put('/rategain-availability', 'AvailabilityController@check')->middleware('auth');
Route::post('/rategain-availability', 'AvailabilityController@send')->middleware('auth');
// Route::resource('rategain-requests', 'RategainRequestController');

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/passport', 'PassportController@index')->name('passport');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
