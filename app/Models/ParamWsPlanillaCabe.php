<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsPlanillaCabe
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
class ParamWsPlanillaCabe extends Model
{
	protected $table = 'param_ws_planilla_cabe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cons' => 'int',
		'emp_codi' => 'int',
		'top_codi' => 'int'
	];

	protected $fillable = [
		'cons',
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
