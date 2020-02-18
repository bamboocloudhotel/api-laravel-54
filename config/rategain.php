<?php

return [
    'url' => 'https://rzhospicert.rategain.com/rgbridgeapi/ari/receive',
    'auth' => 'Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
    'username' => 'jefe.revenue@germanmoraleshoteles.com',
    'password' => 'gemo!d@pa7t',
    'hotelCode' => 20915,
    'rooms_cl' => [ // channel to local
        'SGL' => '12',
        'DBL' => '13',
    ],
    'rooms_lc' => [ // local to channel
        '12' => 'SGL',
        '13' => 'DBL',
    ],
    'paymentType' => '46',
    'warrantyType' => '2',
    'programType' => '7',
    'codpla' => 766,
    'tipres' => '2',
];
