<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsReccadVenta
 * 
 * @property int $cons
 * @property int $emp_codi
 * @property int $top_codi
 * @property string $mte_desc
 * @property string $mte_esta
 * @property string $ter_coda
 * @property string $cfl_codi
 * @property string $caj_codi
 * @property string $arb_cods
 * @property string $dst_codi
 * @property string $metodo
 *
 * @package App\Models
 */
class ParamWsReccadVenta extends Model
{
	protected $table = 'param_ws_reccad_ventas';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'emp_codi' => 'int',
		'top_codi' => 'int'
	];

	protected $fillable = [
		'emp_codi',
		'top_codi',
		'mte_desc',
		'mte_esta',
		'ter_coda',
		'cfl_codi',
		'caj_codi',
		'arb_cods',
		'dst_codi',
		'metodo'
	];
}
