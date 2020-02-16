<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logintneg
 * 
 * @property int $idintneg
 * @property string $nombre_archivo
 * @property string $ubicacion_archivo
 * @property string $fecha_cierre
 * @property string $sistema
 * @property string $medio_envio
 * @property string $enviado
 * @property string $error_envio
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 *
 * @package App\Models
 */
class Logintneg extends Model
{
	protected $table = 'logintneg';
	protected $primaryKey = 'idintneg';
	public $timestamps = false;

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'nombre_archivo',
		'ubicacion_archivo',
		'fecha_cierre',
		'sistema',
		'medio_envio',
		'enviado',
		'error_envio',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
