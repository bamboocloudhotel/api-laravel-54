<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detpla21122013
 * 
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 *
 * @package App\Models
 */
class Detpla21122013 extends Model
{
	protected $table = 'detpla_21122013';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int',
		'codcar' => 'int',
		'valor' => 'float',
		'moneda' => 'int'
	];

	protected $fillable = [
		'codpla',
		'codcar',
		'valor',
		'moneda'
	];
}
