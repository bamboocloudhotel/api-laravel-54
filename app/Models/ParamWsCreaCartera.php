<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsCreaCartera
 * 
 * @property int $cons
 * @property int $empresa
 * @property int $tipo_operacion
 * @property string $descripcion
 * @property int $dcl_codd
 * @property int $abr_cods
 * @property int $abr_coda
 * @property int $abr_codc
 * @property int $abr_codp
 * @property string $cxc_tipo
 * @property int $cxc_cond
 *
 * @package App\Models
 */
class ParamWsCreaCartera extends Model
{
	protected $table = 'param_ws_crea_cartera';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'empresa' => 'int',
		'tipo_operacion' => 'int',
		'dcl_codd' => 'int',
		'abr_cods' => 'int',
		'abr_coda' => 'int',
		'abr_codc' => 'int',
		'abr_codp' => 'int',
		'cxc_cond' => 'int'
	];

	protected $fillable = [
		'empresa',
		'tipo_operacion',
		'descripcion',
		'dcl_codd',
		'abr_cods',
		'abr_coda',
		'abr_codc',
		'abr_codp',
		'cxc_tipo',
		'cxc_cond'
	];
}
