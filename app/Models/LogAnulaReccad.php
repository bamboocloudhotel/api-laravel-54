<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogAnulaReccad
 * 
 * @property int $cons
 * @property string $b_doc
 * @property string $seven_doc
 * @property int $retorno
 * @property string $error
 * @property Carbon $fecha_proceso
 *
 * @package App\Models
 */
class LogAnulaReccad extends Model
{
	protected $table = 'log_anula_reccad';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'retorno' => 'int'
	];

	protected $dates = [
		'fecha_proceso'
	];

	protected $fillable = [
		'b_doc',
		'seven_doc',
		'retorno',
		'error',
		'fecha_proceso'
	];
}
