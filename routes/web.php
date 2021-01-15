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

Auth::routes();

Route::get('/rategain-requests', 'RategainRequestController@index');
Route::get('/rategain-requests/{id}', 'RategainRequestController@show');
Route::get('/rategain-inventory-updates', 'InventoryUpdateController@index');
Route::get('/rategain-inventory-updates/{id}', 'InventoryUpdateController@show');
// Route::resource('rategain-requests', 'RategainRequestController');

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/passport', 'PassportController@index')->name('passport');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
