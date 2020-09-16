<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hisusu
 * 
 * @property int $id
 * @property int $codusu
 * @property int $noption
 * @property string $naction
 * @property int $number
 * @property int $lasttime
 *
 * @package App\Models
 */
class Hisusu extends Model
{
	protected $table = 'hisusu';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'noption' => 'int',
		'number' => 'int',
		'lasttime' => 'int'
	];

	protected $fillable = [
		'codusu',
		'noption',
		'naction',
		'number',
		'lasttime'
	];
}
