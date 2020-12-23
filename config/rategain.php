<?php

return [
    'url' => 'https://cglive.rategain.com/RezGainRGBridgeAPI/ari/receive/germanmorales', //'https://rzhospicert.rategain.com/rgbridgeapi/ari/receive',
    'auth' => 'Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
    'username' => 'GRM@123', // 'jefe.revenue@germanmoraleshoteles.com',
    'password' => 'gemo!d@pa7t', // gemo!d@pa7t',
    'hotelCode' => 'bhparque93',
    'rooms_cl' => [ // channel to local
    	'TWIN' => '3',
        'ESTANDAR' => '12',
        'ESPECIAL ESTANDAR' => '13',
    ],
    'rooms_lc' => [ // local to channel
    	'3' => 'TWIN',
        '12' => 'ESTANDAR',
        '13' => 'ESPECIAL ESTANDAR',
    ],
    'paymentType' => '46',
    'warrantyType' => '2',
    'programType' => '7',
    'codpla' => 766,
    'tipres' => '2',
];
