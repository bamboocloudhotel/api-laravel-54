<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Divcar
 * 
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $cuetra
 * @property int $itetra
 * @property float $valdiv
 * @property int $codusu
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Divcar extends Model
{
	protected $table = 'divcar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numcue' => 'int',
		'item' => 'int',
		'cuetra' => 'int',
		'itetra' => 'int',
		'valdiv' => 'float',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'numfol',
		'numcue',
		'item',
		'cuetra',
		'itetra',
		'valdiv',
		'codusu',
		'fecha'
	];
}
