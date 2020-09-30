<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Regtel
 * 
 * @property int $id
 * @property Carbon $fecha
 * @property string $hora
 * @property int $numfol
 * @property string $descripcion
 * @property int $extension
 * @property string $duracion
 * @property string $telefono
 * @property float $valor
 * @property float $total
 * @property string $sync
 *
 * @package App\Models
 */
class Regtel extends Model
{
	protected $table = 'regtel';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'extension' => 'int',
		'valor' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'hora',
		'numfol',
		'descripcion',
		'extension',
		'duracion',
		'telefono',
		'valor',
		'total',
		'sync'
	];
}
