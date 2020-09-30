<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SmtpLogEmail
 * 
 * @property int $id_log_email
 * @property string $tabla_origen
 * @property string $id_origen
 * @property string $email_orige
 * @property string $email_desti
 * @property int $id_plantilla
 * @property string $datos
 * @property string $enviado
 * @property string $error_envio
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 *
 * @package App\Models
 */
class SmtpLogEmail extends Model
{
	protected $table = 'smtp_log_email';
	protected $primaryKey = 'id_log_email';
	public $timestamps = false;

	protected $casts = [
		'id_plantilla' => 'int'
	];

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'tabla_origen',
		'id_origen',
		'email_orige',
		'email_desti',
		'id_plantilla',
		'datos',
		'enviado',
		'error_envio',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
