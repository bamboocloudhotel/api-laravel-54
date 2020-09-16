<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPlanillaReccad
 * 
 * @property int $cons
 * @property string $bfac
 * @property string $fac_seven
 * @property string $fac_cont
 * @property Carbon $fecha_procesa
 * @property string $proceso
 *
 * @package App\Models
 */
class LogPlanillaReccad extends Model
{
	protected $table = 'log_planilla_reccad';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cons' => 'int'
	];

	protected $dates = [
		'fecha_procesa'
	];

	protected $fillable = [
		'cons',
		'bfac',
		'fac_seven',
		'fac_cont',
		'fecha_procesa',
		'proceso'
	];
}
