<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamWsReccadVForpag
 * 
 * @property int $cons
 * @property int $forma
 * @property int $forpag
 * @property int $tac_codi
 * @property int $ban_codi
 * @property int $dfo_chec
 * @property string $dfo_nocu
 * @property string $dfo_chep
 * @property string $dfo_cedu
 * @property string $dfo_nomg
 * @property string $dfo_clav
 * @property float $dfo_base
 *
 * @package App\Models
 */
class ParamWsReccadVForpag extends Model
{
	protected $table = 'param_ws_reccad_v_forpag';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'forma' => 'int',
		'forpag' => 'int',
		'tac_codi' => 'int',
		'ban_codi' => 'int',
		'dfo_chec' => 'int',
		'dfo_base' => 'float'
	];

	protected $fillable = [
		'forma',
		'forpag',
		'tac_codi',
		'ban_codi',
		'dfo_chec',
		'dfo_nocu',
		'dfo_chep',
		'dfo_cedu',
		'dfo_nomg',
		'dfo_clav',
		'dfo_base'
	];
}
