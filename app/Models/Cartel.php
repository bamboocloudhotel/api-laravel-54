<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cartel
 * 
 * @property int $id
 * @property Carbon $fecha
 * @property string $hora
 * @property string $descripcion
 * @property int $ext
 * @property string $numhab
 * @property string $duracion
 * @property string $telefono
 * @property float $valmin
 *
 * @package App\Models
 */
class Cartel extends Model
{
	protected $table = 'cartel';
	public $timestamps = false;

	protected $casts = [
		'ext' => 'int',
		'valmin' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'hora',
		'descripcion',
		'ext',
		'numhab',
		'duracion',
		'telefono',
		'valmin'
	];
}
