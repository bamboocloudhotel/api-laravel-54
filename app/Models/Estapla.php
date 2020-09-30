<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estapla
 * 
 * @property Carbon $fecha
 * @property int $tippla
 * @property int $unidad
 * @property float $venta
 *
 * @package App\Models
 */
class Estapla extends Model
{
	protected $table = 'estapla';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tippla' => 'int',
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
