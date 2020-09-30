<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsReccajImpuesto
 * 
 * @property int $cons
 * @property int $codcar
 * @property string $descripcion
 * @property string $concepto
 * @property float $porc_iva
 * @property float $porc_impo
 * @property int $control
 *
 * @package App\Models
 */
class ParamWsReccajImpuesto extends Model
{
	protected $table = 'param_ws_reccaj_impuestos';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int',
		'porc_iva' => 'float',
		'porc_impo' => 'float',
		'control' => 'int'
	];

	protected $fillable = [
		'codcar',
		'descripcion',
		'concepto',
		'porc_iva',
		'porc_impo',
		'control'
	];
}
