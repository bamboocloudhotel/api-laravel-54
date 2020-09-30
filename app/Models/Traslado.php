<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Traslado
 * 
 * @property int $id
 * @property Carbon $fecha
 * @property int $codusu
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $newfol
 * @property int $newcue
 * @property int $newitem
 *
 * @package App\Models
 */
class Traslado extends Model
{
	protected $table = 'traslado';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'numfol' => 'int',
		'numcue' => 'int',
		'item' => 'int',
		'newfol' => 'int',
		'newcue' => 'int',
		'newitem' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'codusu',
		'numfol',
		'numcue',
		'item',
		'newfol',
		'newcue',
		'newitem'
	];
}
