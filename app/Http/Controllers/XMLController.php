<?php

namespace App\Http\Controllers;

use App\BambooInstance;
use App\Models\Canre;
use App\Models\Motcan;
use App\Rategain\Rategain;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\RategainRequest;
use Illuminate\Support\Facades\Log;

class XMLController extends Controller
{
    protected $rategain;

    public function __construct()
    {
        $this->rategain = new Rategain();
    }

    public function index(Request $request)
    {
        $rawXml = trim($request->getContent());

        if (!$rawXml) {
            return response()->xml($this->rategain->reservationResponseError);
        }

        $cleanXml = $this->removeEmoticon($rawXml);
        $parsed = $this->parseRequestXml($cleanXml, true);
        
        if (isset($parsed['error'])) {
            Log::error("Rategain XML Parse Error: " . $parsed['error'], ['xml' => $rawXml]);
            return response()->xml($this->rategain->getReservationError(['general_error']));
        }

        $data = $parsed['data'];
        $resStatus = $data['ResStatus'] ?? 'NOT_FOUND';
        
        $reservationObject = json_decode(json_encode($data));
        $confirmationid = $this->rategain->uniqidReal(16);
        
        $rategainRequest = RategainRequest::create([
            'reference' => 'Rategain ' . ($reservationObject->HotelReservations->HotelReservation->ResGlobalInfo->HotelReservationIDs->HotelReservationID[0]->ResID_Value ?? 'N/A'),
            'type' => $resStatus,
            'request' => json_encode($reservationObject),
            'xml' => $cleanXml,
            'hotel' => $reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode ?? 'N/A'
        ]);

        try {
            switch ($resStatus) {
                case 'Commit':
                    return $this->handleCommit($reservationObject, $data, $rategainRequest, $confirmationid);
                case 'Modify':
                    return $this->handleModify($reservationObject, $data, $rategainRequest, $confirmationid);
                case 'Cancel':
                    return $this->handleCancel($reservationObject, $data, $rategainRequest, $confirmationid);
                default:
                    return $this->handleError($rategainRequest, "Invalid ResStatus: $resStatus");
            }
        } catch (\Exception $e) {
            Log::error("Error processing Rategain request: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            $errResponse = $this->rategain->getReservationError(['general_error']);
            $rategainRequest->update(['response' => $errResponse, 'confirmation_id' => 'ERROR']);
            return response()->xml($errResponse);
        }
    }

    private function handleCommit($reservationObject, $data, $rategainRequest, $confirmationid)
    {
        $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

        $resID = $data['HotelReservations']['HotelReservation']['ResGlobalInfo']['HotelReservationIDs']['HotelReservationID'] ?? null;
        $refValue = is_array($resID) && isset($resID[1]) ? $resID[1]['ResID_Value'] : ($resID['ResID_Value'] ?? '');

        $exists = Reserva::where('referencia', 'LIKE', '%' . $refValue . '%')
            ->whereIn('reserva.estado', ['P', 'G', 'H'])->first();

        if ($exists) {
            $errResponse = $this->rategain->getReservationError(['exists']);
            $rategainRequest->update(['response' => $errResponse, 'confirmation_id' => 'EXISTS']);
            return response()->xml($errResponse);
        }

        $response = $this->rategain->saveReservation($reservationObject, $confirmationid);
        $rategainRequest->update(['response' => $response, 'confirmation_id' => $confirmationid]);
        return response()->xml($response);
    }

    private function handleModify($reservationObject, $data, $rategainRequest, $confirmationid)
    {
        $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);

        $resID = $data['HotelReservations']['HotelReservation']['ResGlobalInfo']['HotelReservationIDs']['HotelReservationID'] ?? null;
        $refValue = is_array($resID) && isset($resID[1]) ? $resID[1]['ResID_Value'] : ($resID['ResID_Value'] ?? '');

        $reserva = Reserva::where('referencia', 'LIKE', '%' . $refValue . '%')
            ->where('reserva.estado', '<>', 'C')
            ->orderBy('fecres', 'desc')
            ->first();

        if (!$reserva) {
            $errResponse = $this->rategain->getReservationError(['reservation.notFound']);
            $rategainRequest->update(['response' => $errResponse, 'confirmation_id' => 'NOT_FOUND']);
            return response()->xml($errResponse);
        }

        $this->rategain->originalReservation = $reserva;
        $response = $this->rategain->saveReservation($reservationObject, $confirmationid, true);
        
        $rategainRequest->update(['response' => $response, 'confirmation_id' => $confirmationid]);
        return response()->xml($response);
    }

    private function handleCancel($reservationObject, $data, $rategainRequest, $confirmationid)
    {
        $this->getInstance($reservationObject->HotelReservations->HotelReservation->BasicPropertyInfo->HotelCode);
        
        $resID = $data['HotelReservations']['HotelReservation']['ResGlobalInfo']['HotelReservationIDs']['HotelReservationID'] ?? null;
        $refValue = is_array($resID) && isset($resID[1]) ? $resID[1]['ResID_Value'] : ($resID['ResID_Value'] ?? '');

        $reserva = Reserva::where('referencia', 'LIKE', '%' . $refValue . '%')
            ->where('reserva.estado', '<>', 'C')->get();

        if ($reserva->isEmpty()) {
            $successXml = $this->rategain->reservationResponseSuccess;
            $successXml = str_replace(['123456789', 'chd23242342'], [$confirmationid, $refValue], $successXml);
            $rategainRequest->update(['response' => $successXml, 'confirmation_id' => 'ALREADY_CANCELLED']);
            return response()->xml($successXml);
        }

        foreach ($reserva as $res) {
            $motcan = Motcan::firstOrCreate(['detalle' => 'INTEGRACIÓN CANCELACIÓN'], ['motcan' => (Motcan::max('motcan') + 1)]);
            Canre::create([
                'codcan' => (Canre::max('codcan') + 1),
                'numres' => $res->numres,
                'feccan' => date('Y-m-d'),
                'hora' => date('H:i'),
                'descripcion' => 'Reserva cancelada por la integración Rategain',
                'solicitada' => 'Integración Rategain',
                'codusu' => 1,
                'motcan' => $motcan->motcan,
            ]);
            $res->update(['cancellationid' => $confirmationid, 'estado' => 'C']);
        }

        $successXml = $this->rategain->reservationResponseSuccess;
        $successXml = str_replace(['123456789', 'chd23242342'], [$confirmationid, $refValue], $successXml);

        $rategainRequest->update(['response' => $successXml, 'confirmation_id' => $confirmationid]);
        return response()->xml($successXml);
    }

    private function handleError($rategainRequest, $message)
    {
        $errResponse = $this->rategain->reservationResponseError;
        $rategainRequest->update(['response' => $errResponse, 'confirmation_id' => 'ERROR']);
        return response()->xml($errResponse);
    }

    public function parseRequestXml($xml, $array = false)
    {
        libxml_use_internal_errors(true);
        try {
            $sxe = new \SimpleXMLElement($xml);
            if ($sxe === false) {
                $errors = libxml_get_errors();
                $msg = "";
                foreach ($errors as $error) $msg .= sprintf("XML Error: %s at line %d. ", trim($error->message), $error->line);
                libxml_clear_errors();
                return ['error' => $msg];
            }
            
            $data = $this->xmlToArray($sxe);
            return ['data' => $data, 'method' => $sxe->getName()];

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    private function xmlToArray($xml) {
        $array = (array)$xml;
        foreach ($xml->attributes() as $key => $value) {
            $array[$key] = (string)$value;
        }
        foreach ($array as $key => $value) {
            if ($value instanceof \SimpleXMLElement) {
                $array[$key] = $this->xmlToArray($value);
            } elseif (is_array($value)) {
                foreach ($value as $k => $v) {
                    if ($v instanceof \SimpleXMLElement) {
                        $value[$k] = $this->xmlToArray($v);
                    }
                }
                $array[$key] = $value;
            }
        }
        return $array;
    }

    public function getInstance($rgHotelCode)
    {
        $instance = BambooInstance::with('bambooInstanceRooms')->where('rg_hotel_code', $rgHotelCode)->firstOrFail();
        \Config::set("database.connections.on_the_fly", [
            "driver" => "mysql", "host" => $instance->db_host, "port" => $instance->db_port,
            "database" => $instance->db_database, "username" => $instance->db_username,
            "password" => $instance->db_password, "charset" => "utf8", "collation" => "utf8_general_ci", "strict" => true,
        ]);
        $rooms_cl = []; $rooms_lc = [];
        foreach ($instance->bambooInstanceRooms as $room) {
            $rooms_cl[$room->rg_room] = $room->bb_room;
            $rooms_lc[$room->bb_room] = $room->rg_room;
        }
        \Config::set("rategain", [
            'url' => $instance->rg_api_url, 'hotelCode' => $instance->rg_hotel_code,
            'rooms_cl' => $rooms_cl, 'rooms_lc' => $rooms_lc, 'codpla' => $instance->codpla,
            'tipres' => $instance->tipres, 'username' => $instance->rg_username, 'password' => $instance->rg_password,
        ]);
    }

    private function removeEmoticon($text) {
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $text);
        return preg_replace('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', '', $text);
    }
}
