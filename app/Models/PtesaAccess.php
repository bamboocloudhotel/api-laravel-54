<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaAccess
 * 
 * @property int $id
 * @property string $canal
 * @property string $origen
 * @property string $usuario
 * @property string $token
 * @property string $claveTecnica
 * @property string $extensionArchivo
 * @property string $formatoArchivo
 * @property string $idDistribuidor
 * @property string $idSoftwareFacturacion
 * @property string $codigoSucursal
 * @property Carbon $feFechaIni
 *
 * @package App\Models
 */
class PtesaAccess extends Model
{
	protected $table = 'ptesa_access';
	public $timestamps = false;

	protected $dates = [
		'feFechaIni'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'canal',
		'origen',
		'usuario',
		'token',
		'claveTecnica',
		'extensionArchivo',
		'formatoArchivo',
		'idDistribuidor',
		'idSoftwareFacturacion',
		'codigoSucursal',
		'feFechaIni'
	];
}
