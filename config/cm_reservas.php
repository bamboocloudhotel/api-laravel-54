<?php

return [
    'url' => 'https://api.roomcloud.net',
    'apiKey' => 'bamboo_900hty5768fj5o6msds4',
    'hotel_id' => 12314, // 3885,
    'userName' => '12314',// '3885',
    'password' => 'Inntuhotel2021*',// 'Bamboo2019',
    'action' => '/be/search/xml.jsp',
    'rooms_cl' => [ // channel to local
        '69451' => '10', // individual 
        '69753' => '9', // twin
        '69752' => '8', // doble
        '74160' => '4', // suite 
    ],
    'rooms_lc' => [ // local to channel
        '10' => '69451', // individual 
        '9' => '69753', // twin
        '8' => '69752', // doble
        '4' => '74160', // suite 
    ],
    'paymentType' => '12',
    'warrantyType' => '2',
    'programType' => '1',
    'codpla' => 89,
    'tipres' => '2',
];
