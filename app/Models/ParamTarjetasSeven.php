<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamTarjetasSeven
 * 
 * @property int $cons
 * @property string $cod_tarjeta_b
 * @property string $cod_seven
 *
 * @package App\Models
 */
class ParamTarjetasSeven extends Model
{
	protected $table = 'param_tarjetas_seven';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $fillable = [
		'cod_tarjeta_b',
		'cod_seven'
	];
}
