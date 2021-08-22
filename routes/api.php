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

  Route::any('test', function (Request $request) {
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

  Route::get('test/availabilities', function (Request $request) {

    $testSoapController = new \App\Http\Controllers\Api\TestSoapController($request);

    $testSoapController->setRateGainConfig($request->get('hotelId'));

    $sql = "
    SELECT blohab.numhab
    FROM blohab
    LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
    WHERE blohab.fecini <= '{$request->get('end')}' AND blohab.fecfin >= '{$request->get('start')}'
    AND blohab.fecdes IS NULL
    AND habitacion.codcla = {$request->get('class')}
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
    WHERE reserva.feclle <= '{$request->get('start')}' AND reserva.fecsal >= '{$request->get('end')}'
    AND reserva.estado IN ('P','G')
    AND habitacion.codcla = {$request->get('class')}
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
    WHERE folio.feclle <= '{$request->get('start')}' AND folio.fecsal >= '{$request->get('end')}'
    AND reserva.estado IN ('H')
    AND folio.estado IN ('I')
    AND habitacion.codcla = {$request->get('class')}
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
    AND habitacion.codcla = {$request->get('class')}
    AND habitacion.tipo = 'V'
    ";

    $numhab = collect(\DB::connection('on_the_fly')->select($sql));

    $roomsAvailable = implode('\',\'', $numhab->pluck('numhab')->unique()->sort()->values()->all());

    // dd($roomsBlocked, $roomsReserved, $roomsHosted, $roomsOccupied, $roomsAvailable);

    return response()->json([
      'message' => "OK",
      'available' => $roomsAvailable == "''" ? null : $roomsAvailable,
      'notAvailable' => $roomsOccupied == "''" ? null : $roomsOccupied
    ]);

  });

  Route::post('test/set-availability', function (Request $request) {
    $testSoapController = new \App\Http\Controllers\Api\TestSoapController($request);
    $testSoapController->setRateGainConfig($request->get('hotelId'));
    $feclle = $request->get('feclle');
    $fecsal = $request->get('fecsal');
    $codcla = $request->get('codcla');

    dd($request->all());
  });

  Route::get('test/availability', function (Request $request) {

    $testSoapController = new \App\Http\Controllers\Api\TestSoapController($request);

    $testSoapController->setRateGainConfig($request->get('hotelId'));

    $feclle = $request->get('feclle');
    $fecsal = $request->get('fecsal');
    $codcla = $request->get('codcla');

    if (!$fecsal) {
      $fecsal = date('Y-m-d', strtotime($request->get('feclle'). '+ 1 days'));
    }

    $sqlAvailable = "
    SELECT * 
    FROM habitacion 
    WHERE numhab NOT IN(
      SELECT reserva.numhab 
      FROM reserva 
      INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
      WHERE '{$feclle}' < reserva.fecsal 
      AND '{$fecsal}' > reserva.feclle 
      AND reserva.estado IN ('P','G')
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    AND numhab NOT IN(
      SELECT folio.numhab 
      FROM folio
      INNER JOIN habitacion ON folio.numhab = habitacion.numhab
      WHERE '{$feclle}' < folio.fecsal 
      AND '{$fecsal}' > folio.feclle 
      AND folio.estado IN ('I')
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    AND numhab NOT IN(
      SELECT blohab.numhab
      FROM blohab
      LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
      WHERE '{$feclle}' <= blohab.fecfin 
      AND '{$fecsal}' >= blohab.fecini
      AND blohab.fecdes IS NULL
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    AND codcla = {$codcla}
    AND tipo = 'V'
    ";

    $sqlOccupied = "
    SELECT * 
    FROM habitacion 
    WHERE numhab IN(
      SELECT reserva.numhab 
      FROM reserva 
      INNER JOIN habitacion ON reserva.numhab = habitacion.numhab
      WHERE '{$feclle}' < reserva.fecsal 
      AND '{$fecsal}' > reserva.feclle 
      AND reserva.estado IN ('P','G')
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    OR numhab IN(
      SELECT folio.numhab 
      FROM folio
      INNER JOIN habitacion ON folio.numhab = habitacion.numhab
      WHERE '{$feclle}' < folio.fecsal 
      AND '{$fecsal}' > folio.feclle 
      AND folio.estado IN ('I')
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    OR numhab IN(
      SELECT blohab.numhab
      FROM blohab
      LEFT JOIN habitacion ON blohab.numhab = habitacion.numhab
      WHERE '{$feclle}' <= blohab.fecfin 
      AND '{$fecsal}' >= blohab.fecini
      AND blohab.fecdes IS NULL
      AND habitacion.codcla = {$codcla}
      AND habitacion.tipo = 'V'
    )
    AND codcla = {$codcla}
    AND tipo = 'V'
    ";

    $roomsOccupied = collect(\DB::connection('on_the_fly')->select($sqlOccupied));
    $roomsAvailable = collect(\DB::connection('on_the_fly')->select($sqlAvailable));

    return response()->json([
      'message' => "OK",
      'available' => $roomsAvailable->pluck('numhab'),
      'availableCount' => $roomsAvailable->pluck('numhab')->count(),
      'notAvailable' => $roomsOccupied->pluck('numhab'),
      'notAvailableCount' => $roomsOccupied->pluck('numhab')->count()
    ]);

  });


