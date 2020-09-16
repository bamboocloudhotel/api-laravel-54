<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detegr
 * 
 * @property int $numegr
 * @property int $numero
 * @property int $forpag
 * @property int $numfor
 * @property Carbon $fecven
 * @property float $ivarep
 * @property float $valorm
 * @property float $valor
 *
 * @package App\Models
 */
class Detegr extends Model
{
	protected $table = 'detegr';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numegr' => 'int',
		'numero' => 'int',
		'forpag' => 'int',
		'numfor' => 'int',
		'ivarep' => 'float',
		'valorm' => 'float',
		'valor' => 'float'
	];

	protected $dates = [
		'fecven'
	];

	protected $fillable = [
		'forpag',
		'numfor',
		'fecven',
		'ivarep',
		'valorm',
		'valor'
	];
}
