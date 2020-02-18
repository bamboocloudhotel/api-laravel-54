<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detcar
 * 
 * @property int $id
 * @property int $carpla_id
 * @property int $numfol
 * @property int $codpla
 * @property Carbon $fecha
 * @property int $numcue
 * @property int $item
 *
 * @package App\Models
 */
class Detcar extends Model
{
	protected $table = 'detcar';
	public $timestamps = false;

	protected $casts = [
		'carpla_id' => 'int',
		'numfol' => 'int',
		'codpla' => 'int',
		'numcue' => 'int',
		'item' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'carpla_id',
		'numfol',
		'codpla',
		'fecha',
		'numcue',
		'item'
	];
}
