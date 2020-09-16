<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmacti
 * 
 * @property int $id
 * @property int $codusu
 * @property string $tipo
 * @property string $asunto
 * @property string $descripcion
 * @property Carbon $fecha
 * @property string $hora
 * @property string $tiplla
 * @property string $contes
 * @property string $duracion
 * @property string $recordar
 * @property int $cuando
 * @property int $events_id
 * @property string $ubicacion
 * @property string $tiprel
 * @property int $codopo
 * @property int $codcam
 * @property string $nit
 *
 * @package App\Models
 */
class Crmacti extends Model
{
	protected $table = 'crmacti';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'cuando' => 'int',
		'events_id' => 'int',
		'codopo' => 'int',
		'codcam' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'codusu',
		'tipo',
		'asunto',
		'descripcion',
		'fecha',
		'hora',
		'tiplla',
		'contes',
		'duracion',
		'recordar',
		'cuando',
		'events_id',
		'ubicacion',
		'tiprel',
		'codopo',
		'codcam',
		'nit'
	];
}
