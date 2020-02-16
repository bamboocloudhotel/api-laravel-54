<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XMLController extends Controller
{
    //
    public function index(Request $request)
    {
        $xml = $request->getContent();

        $data = $this->parseRequestXml($xml, true);

        $validation = \Validator::make($data, [
            'method' => 'required|in:OTA_HotelResNotifRQ'
        ]);

        if ($validation->fails()) {
            return response()->xml($validation->errors(), $status = 200, $headers = [], $xmlRoot = 'OTA_HotelResNotifRS');
        }

        return response()->xml([
            'data' => $data['data'],
            'method' => $data['method'],
        ]);

    }

    public function parseRequestXml($xml, $array = false)
    {
        $sxe = new \SimpleXMLElement($xml);

        $method = $sxe->getName();

        $object = $sxe;

        $json = json_encode($object);
        $matches = null;
        preg_match_all("|\"@attributes\"\:\{(.*)\}|U", $json, $matches);
        $cnt = 0;
        foreach ($matches[0] as $match) {
            $json = str_replace($matches[0][$cnt], $matches[1][$cnt], $json);
            $cnt++;
        }

        $data = json_decode($json, $array);

        return [
            'data' => $data,
            'method' => $method,
        ];
    }
}
