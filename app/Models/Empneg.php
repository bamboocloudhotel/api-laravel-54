<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empneg
 * 
 * @property int $id
 * @property string $nit
 * @property int $codpla
 * @property string $observacion
 * @property string $servicios
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $polgar
 * @property string $polcan
 * @property string $codcor
 *
 * @package App\Models
 */
class Empneg extends Model
{
	protected $table = 'empneg';
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'nit',
		'codpla',
		'observacion',
		'servicios',
		'fecini',
		'fecfin',
		'polgar',
		'polcan',
		'codcor'
	];
}
