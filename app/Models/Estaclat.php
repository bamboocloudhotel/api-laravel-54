<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estaclat
 * 
 * @property Carbon $fecha
 * @property int $codcla
 * @property int $unidad
 * @property float $valor
 * @property float $aloja
 * @property int $numadu
 * @property int $numnin
 *
 * @package App\Models
 */
class Estaclat extends Model
{
	protected $table = 'estaclat';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcla' => 'int',
		'unidad' => 'int',
		'valor' => 'float',
		'aloja' => 'float',
		'numadu' => 'int',
		'numnin' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'unidad',
		'valor',
		'aloja',
		'numadu',
		'numnin'
	];
}
