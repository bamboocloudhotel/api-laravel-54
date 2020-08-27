<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsReccajVDetum
 * 
 * @property int $cons_reccaj_v_deta
 * @property int $codcar
 * @property string $area
 * @property string $centro_costo
 * @property string $sucursal
 * @property string $proyecto
 * @property string $cuenta_inve
 * @property string $cuenta_costo
 * @property int $concepto
 * @property string $codigo_producto
 * @property string $codigo_destino
 * @property string $grabador
 * @property Carbon $fecha_graba
 * @property string $estado
 *
 * @package App\Models
 */
class ParamWsReccajVDetum extends Model
{
	protected $table = 'param_ws_reccaj_v_deta';
	protected $primaryKey = 'cons_reccaj_v_deta';
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int',
		'concepto' => 'int'
	];

	protected $dates = [
		'fecha_graba'
	];

	protected $fillable = [
		'codcar',
		'area',
		'centro_costo',
		'sucursal',
		'proyecto',
		'cuenta_inve',
		'cuenta_costo',
		'concepto',
		'codigo_producto',
		'codigo_destino',
		'grabador',
		'fecha_graba',
		'estado'
	];
}
