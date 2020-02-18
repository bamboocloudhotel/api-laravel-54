<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detpla
 * 
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 * @property float $subsidio
 *
 * @package App\Models
 */
class Detpla extends Model
{
	protected $table = 'detpla';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int',
		'codcar' => 'int',
		'valor' => 'float',
		'moneda' => 'int',
		'subsidio' => 'float'
	];

	protected $fillable = [
		'valor',
		'moneda',
		'subsidio'
	];
}
