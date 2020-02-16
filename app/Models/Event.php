<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * 
 * @property int $id
 * @property int $codusu
 * @property string $titulo
 * @property string $nota
 * @property Carbon $fecha
 * @property string $hora
 * @property string $repetir
 * @property string $terminar
 * @property Carbon $fecha_final
 * @property int $frecuencia
 * @property int $dia
 * @property string $alarma
 * @property string $estado
 *
 * @package App\Models
 */
class Event extends Model
{
	protected $table = 'events';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'frecuencia' => 'int',
		'dia' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_final'
	];

	protected $fillable = [
		'codusu',
		'titulo',
		'nota',
		'fecha',
		'hora',
		'repetir',
		'terminar',
		'fecha_final',
		'frecuencia',
		'dia',
		'alarma',
		'estado'
	];
}
