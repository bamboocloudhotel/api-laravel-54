<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estacont
 * 
 * @property int $codcar
 * @property Carbon $fecha
 * @property float $valor
 * @property float $iva
 * @property float $servicio
 * @property string $aloja
 *
 * @package App\Models
 */
class Estacont extends Model
{
	protected $table = 'estacont';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'servicio' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'valor',
		'iva',
		'servicio',
		'aloja'
	];
}
