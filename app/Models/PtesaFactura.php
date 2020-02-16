<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaFactura
 * 
 * @property int $id
 * @property int $creacion
 * @property int $ultimaOperacion
 * @property string $request
 * @property string $codigoRespuesta
 * @property string $mensajeRespuesta
 * @property string $contenidoCodigoQR
 * @property string $cufe
 * @property string $numeroDocumentoGenerado
 * @property string $ublToString
 * @property int $numfac
 * @property string $prefac
 * @property int $numfol
 * @property string $estado
 * @property string $rg_codigoRespuesta
 * @property string $rg_mensajeRespuesta
 * @property string $rg_request
 * @property boolean $rq_pdf
 *
 * @package App\Models
 */
class PtesaFactura extends Model
{
	protected $table = 'ptesa_facturas';
	public $timestamps = false;

	protected $casts = [
		'creacion' => 'int',
		'ultimaOperacion' => 'int',
		'numfac' => 'int',
		'numfol' => 'int',
		'rq_pdf' => 'boolean'
	];

	protected $fillable = [
		'creacion',
		'ultimaOperacion',
		'request',
		'codigoRespuesta',
		'mensajeRespuesta',
		'contenidoCodigoQR',
		'cufe',
		'numeroDocumentoGenerado',
		'ublToString',
		'numfac',
		'prefac',
		'numfol',
		'estado',
		'rg_codigoRespuesta',
		'rg_mensajeRespuesta',
		'rg_request',
		'rq_pdf'
	];
}
