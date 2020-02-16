<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FechasReporte
 * 
 * @property int $cons
 * @property Carbon $fecha_inicial
 * @property Carbon $fecha_final
 *
 * @package App\Models
 */
class FechasReporte extends Model
{
	protected $table = 'fechas_reportes';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fecha_inicial',
		'fecha_final'
	];

	protected $fillable = [
		'fecha_inicial',
		'fecha_final'
	];
}
