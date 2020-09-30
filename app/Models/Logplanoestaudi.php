<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logplanoestaudi
 * 
 * @property int $idplano
 * @property string $nombre_archivo
 * @property string $ubicacion_archivo
 * @property string $fecha_cierre
 * @property string $send_email
 * @property string $send_ftp
 * @property string $error_email
 * @property string $error_ftp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 *
 * @package App\Models
 */
class Logplanoestaudi extends Model
{
	protected $table = 'logplanoestaudi';
	protected $primaryKey = 'idplano';
	public $timestamps = false;

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'nombre_archivo',
		'ubicacion_archivo',
		'fecha_cierre',
		'send_email',
		'send_ftp',
		'error_email',
		'error_ftp',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
