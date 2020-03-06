<?php

return [
    'url' => 'https://rzhospicert.rategain.com/rgbridgeapi/ari/receive',
    'auth' => 'Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=',
    'username' => 'jefe.revenue@germanmoraleshoteles.com',
    'password' => 'gemo!d@pa7t',
    'hotelCode' => 20915,
    'rooms_cl' => [ // channel to local
        'SGL' => '8',
        'DBL' => '9',
    ],
    'rooms_lc' => [ // local to channel
        '8' => 'SGL',
        '9' => 'DBL',
    ],
    'paymentType' => '15',
    'warrantyType' => '1',
    'programType' => '0',
    'codpla' => 1229,
    'tipres' => '2',
    'tipseg' => 'I',
    'codven' => 45
];
