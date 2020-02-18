<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detpla20130121
 * 
 * @property int $codpla
 * @property int $codcar
 * @property float $valor
 * @property int $moneda
 *
 * @package App\Models
 */
class Detpla20130121 extends Model
{
	protected $table = 'detpla_20130121';
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
