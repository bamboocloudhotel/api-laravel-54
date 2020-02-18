<?php

namespace App\Http\Controllers;

use App\Rategain\Rategain;
use Illuminate\Http\Request;

class XMLController extends Controller
{
    //
    protected $rategain;

    public function __construct()
    {
        $this->rategain = new Rategain();
    }

    public function index(Request $request)
    {
        $xml = $request->getContent();

        if (!$xml) {
            return response()->xml($this->rategain->reservationResponseError);
        }

        $data = $this->parseRequestXml($xml, true);
        $reservationObject = json_decode(json_encode($data['data']));

        $validation = $this->doValidation($reservationObject, $data);

        if ($validation->fails()) {
            $errors = $validation->errors();
            // dd($errors);
            return response()->xml($this->rategain->getReservationError($errors->all()), 422);
        }

        switch ($data['data']['ResStatus']) {
            case 'Commit':
                $response = $this->rategain->saveReservation($reservationObject);
                return response()->xml($response);
                break;
            case 'Modify':
                return response()->xml($this->rategain->reservationResponseSuccess);
                break;
            case 'Cancel':
                return response()->xml($this->rategain->reservationResponseSuccess);
                break;
            default:
                return response()->xml($this->rategain->reservationResponseError);
        }

        dd($data['data']);

        return response()->xml([
            'data' => $data['data'],
            'method' => $data['method'],
        ]);

    }

    public function parseRequestXml($xml, $array = false)
    {
        try {
            $sxe = new \SimpleXMLElement($xml);
        } catch (\Exception $exception) {
            die($this->rategain->reservationResponseError);
        }

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

    public function doValidation($reservationObject, $data)
    {
        if (!is_array($reservationObject->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            $validation = \Validator::make($data, [
                'method' => 'required|in:OTA_HotelResNotifRQ',
                'data.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.POS.Source.BookingChannel.CompanyName.Code' => 'required',
                'data.HotelReservations.HotelReservation.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.HotelReservations.HotelReservation.UniqueID.ID' => 'required',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode' => 'in:' . config('rategain.hotelCode'),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus' => 'in:new,Book,modified',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.RoomTypeCode' => 'required|in:' . implode(',', array_keys(config('rategain.rooms_cl'))),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.NumberOfUnits' => 'required',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate' => 'after:data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End' => 'after:data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
            ], [
                'data.ResStatus.in' => 'data.ResStatus',
                'data.POS.Source.BookingChannel.CompanyName.Code.required' => 'data.POS.Source.BookingChannel.CompanyName.Code',
                'data.HotelReservations.HotelReservation.ResStatus.in' => 'data.HotelReservations.HotelReservation.ResStatus',
                'data.HotelReservations.HotelReservation.UniqueID.ID.required' => 'data.HotelReservations.HotelReservation.UniqueID.ID',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode.in' => 'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus',
                'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.RoomTypeCode.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
            ]);
        }

        if (is_array($reservationObject->HotelReservations->HotelReservation->RoomStays->RoomStay)) {
            $validation = \Validator::make($data, [
                'method' => 'required|in:OTA_HotelResNotifRQ',
                'data.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.POS.Source.BookingChannel.CompanyName.Code' => 'required',
                'data.HotelReservations.HotelReservation.ResStatus' => 'in:Commit,Modify,Cancel',
                'data.HotelReservations.HotelReservation.UniqueID.ID' => 'required',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode' => 'in:' . config('rategain.hotelCode'),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomStayStatus' => 'in:new,Book,modified',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode' => 'required|in:' . implode(',', array_keys(config('rategain.rooms_cl'))),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.NumberOfUnits' => 'required',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.ExpireDate' => 'after:data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start' => 'after:' . date('Y-m-d', strtotime('-1 day')),
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End' => 'after:data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
            ], [
                'data.ResStatus.in' => 'data.ResStatus',
                'data.POS.Source.BookingChannel.CompanyName.Code.required' => 'data.POS.Source.BookingChannel.CompanyName.Code',
                'data.HotelReservations.HotelReservation.ResStatus.in' => 'data.HotelReservations.HotelReservation.ResStatus',
                'data.HotelReservations.HotelReservation.UniqueID.ID.required' => 'data.HotelReservations.HotelReservation.UniqueID.ID',
                'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode.in' => 'data.HotelReservations.HotelReservation.BasicPropertyInfo.HotelCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomStayStatus.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomStayStatus',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.NumberOfUnits.required' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.NumberOfUnits',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.EffectiveDate',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.Rates.Rate.*.ExpireDate.after' => 'data.HotelReservations.HotelReservation.RoomStays.RoomStay.RoomRates.RoomRate.Rates.Rate.*.ExpireDate',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.Start',
                'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End.after' => 'data.HotelReservations.HotelReservation.ResGlobalInfo.TimeSpan.End',
                'data.HotelReservations.HotelReservation.RoomStays.RoomStay.*.RoomRates.RoomRate.RoomTypeCode.in' => 'data.HotelReservations.HotelReservation.RoomStays.RoomRates.RoomRate.RoomTypeCode',
            ]);
        }

        return $validation;
    }
}
