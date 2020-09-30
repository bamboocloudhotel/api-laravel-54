<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estacon
 * 
 * @property string $front
 * @property int $codcar
 * @property Carbon $fecha
 * @property int $codsal
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $servicio
 * @property string $aloja
 *
 * @package App\Models
 */
class Estacon extends Model
{
	protected $table = 'estacon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int',
		'codsal' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'impo' => 'float',
		'servicio' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'valor',
		'iva',
		'impo',
		'servicio',
		'aloja'
	];
}
