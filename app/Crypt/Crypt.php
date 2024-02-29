<?php

namespace App\Crypt;

class Crypt
{
    public static $tcKey = '$a-X1&$a33kS1ow7/0aap#';

    private static $tarjetas = [
        'V' => 'VISA',
        'M' => 'MASTER CARD',
        'A' => 'AMERICAN EXPRESS',
        'D' => 'DINERS'
    ];
    private static $_cypher = 'rijndael-128';

    public static function init()
    {
        srand($_SERVER['REQUEST_TIME']);
    }

    public static function setCypher($cypher)
    {
        self::$_cypher = $cypher;
    }

    public static function validatecard($number)
    {
        global $type;

        $cardtype = [
            "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            "mastercard" => "/^5[1-5][0-9]{14}$/",
            "amex"       => "/^3[47][0-9]{13}$/",
            'diners'     => '/^3(0[0-5]|[68]\d)\d{11}$/',
        ];

        if (preg_match($cardtype['visa'],$number))
        {
            $type= "visa";
            return 'V';

        }
        else if (preg_match($cardtype['mastercard'],$number))
        {
            $type= "mastercard";
            return 'M';
        }
        else if (preg_match($cardtype['amex'],$number))
        {
            $type= "amex";
            return 'A';

        }
        else if (preg_match($cardtype['diners'],$number))
        {
            $type= "diners";
            return 'D';
        }
        else
        {
            error('El número de tarjeta es invalido');
            return false;
        }
    }

    /**
     * Encripta datos
     *
     * @param mixed $data
     * @param string $key
     * @return string
     */
    public static function encrypt($data, $key)
    {
        $td = mcrypt_module_open(self::$_cypher, '', 'ecb', '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $encrypted_data = mcrypt_generic($td, $data);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $encrypted_data;
    }

    /**
     * Decripta datos
     *
     * @param string $data
     * @param string $key
     * @return string
     */
    public static function decrypt($data, $key)
    {
        if ($data != "") {
            $td = mcrypt_module_open(self::$_cypher, '', 'ecb', '');
            $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
            mcrypt_generic_init($td, $key, $iv);
            $decrypted_data = mdecrypt_generic($td, $data);
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
            return rtrim($decrypted_data, "\0\4");
        } else {
            return "";
        }
    }

    public static function getSaltBytes()
    {
        if (!function_exists('openssl_random_pseudo_bytes')) {
            throw new Exception('Openssl extension must be loaded');
        }

        while (true) {

            $safeBytes = preg_replace('/[^0-9a-zA-Z]+/', '', base64_encode(openssl_random_pseudo_bytes(16)));

            if (!$safeBytes) {
                continue;
            }

            if (strlen($safeBytes) < 22) {
                continue;
            }

            break;
        }

        return $safeBytes;
    }

}