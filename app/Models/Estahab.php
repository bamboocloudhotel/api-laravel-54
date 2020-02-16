<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estahab
 * 
 * @property Carbon $fecha
 * @property int $habven
 * @property int $habcom
 * @property int $numaduv
 * @property int $numninv
 * @property int $numaduc
 * @property int $numninc
 *
 * @package App\Models
 */
class Estahab extends Model
{
	protected $table = 'estahab';
	protected $primaryKey = 'fecha';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'habven' => 'int',
		'habcom' => 'int',
		'numaduv' => 'int',
		'numninv' => 'int',
		'numaduc' => 'int',
		'numninc' => 'int'
	];

	protected $dates = [
		'fecha'
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
