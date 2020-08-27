<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estapro
 * 
 * @property Carbon $fecha
 * @property int $tippro
 * @property int $unidad
 * @property float $venta
 *
 * @package App\Models
 */
class Estapro extends Model
{
	protected $table = 'estapro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tippro' => 'int',
		'unidad' => 'int',
		'venta' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'unidad',
		'venta'
	];
}
