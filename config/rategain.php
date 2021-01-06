<?php

return [
    'url' => 'https://cglive.rategain.com/RezGainRGBridgeAPI/ari/receive/germanmorales', //'https://rzhospicert.rategain.com/rgbridgeapi/ari/receive',
    'auth' => 'Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
    'username' => 'GRM@123', // 'jefe.revenue@germanmoraleshoteles.com',
    'password' => 'gemo!d@pa7t', // gemo!d@pa7t',
    'hotelCode' => 'bhparque93',
    'rooms_cl' => [ // channel to local
    	'TWIN' => '2',
        'ESTANDAR' => '1',
        'ESPECIAL ESTANDAR' => '3',
    ],
    'rooms_lc' => [ // local to channel
    	'2' => 'TWIN',
        '1' => 'ESTANDAR',
        '3' => 'ESPECIAL ESTANDAR',
    ],
    'paymentType' => '46',
    'warrantyType' => '2',
    'programType' => '7',
    'codpla' => 5979,
    'tipres' => '2',
];
