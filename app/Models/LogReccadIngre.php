<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogReccadIngre
 * 
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property string $error
 * @property string $proceso
 * @property Carbon $fecha_procesa
 * @property string $tipo_ingreso
 * @property string $login
 *
 * @package App\Models
 */
class LogReccadIngre extends Model
{
	protected $table = 'log_reccad_ingre';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fecha_procesa'
	];

	protected $fillable = [
		'brec',
		'rec_seven',
		'error',
		'proceso',
		'fecha_procesa',
		'tipo_ingreso',
		'login'
	];
}
