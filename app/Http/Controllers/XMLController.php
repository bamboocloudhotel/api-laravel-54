<?php

namespace App\Http\Controllers;

use App\Rategain\Rategain;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\RategainRequest;

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
        try {
            $xml = trim($request->getContent());
        } catch (Exception $exception) {
            return response()->xml($exception->getMessage());
        }

        if (!$xml) {
            return response()->xml($this->rategain->reservationResponseError);
        }

        $data = $this->parseRequestXml($xml, true);
        $reservationObject = json_decode(json_encode($data['data']));

        // dd($data);

        $confirmationid = $this->uniqidReal(16);
        $returnSuccess = $this->rategain->reservationResponseSuccess;

        switch ($data['data']['ResStatus']) {
            case 'Commit':
            // dd($data);

            	try {

            		RategainRequest::create([
            			'reference' => 'Rategain ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
            			'type' => 'commit',
            			'request' => json_encode($reservationObject)
            		]);

            	} catch(Exception $exception) {
        			dd($exception->getMessage());
        		}

                $validation = $this->doValidation($reservationObject, $data);

                if ($validation->fails()) {
                    $errors = $validation->errors();
                    // dd($errors);
                    return response()->xml($this->rategain->getReservationError($errors->all()), 422);
                }
                $response = $this->rategain->saveReservation($reservationObject);
                return response()->xml($response);
                break;
            case 'Modify':
            // dd($data);
            	try {

            		RategainRequest::create([
            			'reference' => 'Rategain ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
            			'type' => 'modify',
            			'request' => json_encode($reservationObject)
            		]);

            	} catch(Exception $exception) {
        			dd($exception->getMessage());

            	}
                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="3" ResID_Value="123456789" />',
                    '<HotelReservationID ResID_Type="3" ResID_Value="' . $confirmationid . '" />', 
                    $returnSuccess
                );
                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>',
                    '<HotelReservationID ResID_Type="14" ResID_Value="' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '"/>',
                    $returnSuccess
                );

                $reserva = Reserva::where('referencia', 'LIKE', '%' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value)->get();

                foreach($reserva as $res) {
                    $res->update([
                        'modifyid' => $confirmationid
                    ]);
                }

                return response()->xml($returnSuccess);
                break;
            case 'Cancel':
            // dd($data);

            	try {

            		RategainRequest::create([
            			'reference' => 'Rategain ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value . ' - ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Type . ' ' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value,
            			'type' => 'cancellation',
            			'request' => json_encode($reservationObject)
            		]);

            	} catch(Exception $exception) {
        			dd($exception->getMessage());
        		}


                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="3" ResID_Value="123456789" />',
                    '<HotelReservationID ResID_Type="3" ResID_Value="' . $confirmationid . '" />', 
                    $returnSuccess
                );
                $returnSuccess = str_replace(
                    '<HotelReservationID ResID_Type="14" ResID_Value="chd23242342"/>',
                    '<HotelReservationID ResID_Type="14" ResID_Value="' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value . '"/>',
                    $returnSuccess
                );

                $reserva = Reserva::where('referencia', 'LIKE', '%' . $reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[1]->ResID_Value)->get();

                foreach($reserva as $res) {
                    $res->update([
                        'cancellationid' => $confirmationid
                    ]);
                }

                return response()->xml($returnSuccess);
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

    /**
     * @param int $lenght
     * @return false|string
     * @throws \Exception
     */
    function uniqidReal($lenght = 13)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            try {
                $bytes = random_bytes(ceil($lenght / 2));
            } catch (\Exception $e) {
                throw new \Exception("random_bytes function available");
            }
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
