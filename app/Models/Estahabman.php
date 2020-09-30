<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estahabman
 * 
 * @property int $ano
 * @property int $mes
 * @property int $habven
 * @property int $habcom
 * @property int $numaduv
 * @property int $numninv
 * @property int $numaduc
 * @property int $numninc
 *
 * @package App\Models
 */
class Estahabman extends Model
{
	protected $table = 'estahabmen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ano' => 'int',
		'mes' => 'int',
		'habven' => 'int',
		'habcom' => 'int',
		'numaduv' => 'int',
		'numninv' => 'int',
		'numaduc' => 'int',
		'numninc' => 'int'
	];

	protected $fillable = [
		'habven',
		'habcom',
		'numaduv',
		'numninv',
		'numaduc',
		'numninc'
	];
}
