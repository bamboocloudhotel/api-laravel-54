<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SmtpPlantilla
 * 
 * @property int $id_plantilla
 * @property string $estado_plantilla
 * @property string $codigo_proceso
 * @property string $descripcion_proceso
 * @property string $plantilla_mail
 * @property int $id_smtp_cuenta
 * @property string $asunto
 * @property string $cuerpo
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 * @property string $anulada
 *
 * @package App\Models
 */
class SmtpPlantilla extends Model
{
	protected $table = 'smtp_plantillas';
	protected $primaryKey = 'id_plantilla';
	public $timestamps = false;

	protected $casts = [
		'id_smtp_cuenta' => 'int'
	];

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'estado_plantilla',
		'codigo_proceso',
		'descripcion_proceso',
		'plantilla_mail',
		'id_smtp_cuenta',
		'asunto',
		'cuerpo',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion',
		'anulada'
	];
}
