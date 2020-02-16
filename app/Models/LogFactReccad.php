<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogFactReccad
 * 
 * @property int $cons
 * @property string $bfac
 * @property string $fac_seven
 * @property string $fac_cont
 * @property Carbon $fecha_procesa
 * @property string $proceso
 * @property string $login
 *
 * @package App\Models
 */
class LogFactReccad extends Model
{
	protected $table = 'log_fact_reccad';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fecha_procesa'
	];

	protected $fillable = [
		'bfac',
		'fac_seven',
		'fac_cont',
		'fecha_procesa',
		'proceso',
		'login'
	];
}
