<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cammon
 * 
 * @property int $numcam
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $moneda
 * @property float $valorm
 * @property float $valorc
 * @property string $estado
 *
 * @package App\Models
 */
class Cammon extends Model
{
	protected $table = 'cammon';
	protected $primaryKey = 'numcam';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numcam' => 'int',
		'numfol' => 'int',
		'moneda' => 'int',
		'valorm' => 'float',
		'valorc' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'numfol',
		'moneda',
		'valorm',
		'valorc',
		'estado'
	];
}
