<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XMLController extends Controller
{
    //
    public function index(Request $request)
    {
        $xml = $request->getContent();

        $sxe = new \SimpleXMLElement($xml);

        $function = $sxe->getName();

        $object = $sxe;

        $json = json_encode($object);
        $matches = null;
        preg_match_all("|\"@attributes\"\:\{(.*)\}|U", $json, $matches);
        $cnt = 0;
        foreach ($matches[0] as $match) {
            $json = str_replace($matches[0][$cnt], $matches[1][$cnt], $json);
            $cnt++;
        }

        return response()->json([
            'data' => $object,
            'function' => $function,
        ]);


    }

    public function replaceBetween($str, $needle_start, $needle_end, $replacement) {
        $pos = strpos($str, $needle_start);
        $start = $pos === false ? 0 : $pos + strlen($needle_start);

        $pos = strpos($str, $needle_end, $start);
        $end = $start === false ? strlen($str) : $pos;

        return substr_replace($str,$replacement,  $start, $end - $start);
    }
}
