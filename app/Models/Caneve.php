<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Caneve
 * 
 * @property int $codcan
 * @property int $codeve
 * @property Carbon $feccan
 * @property int $moteve
 * @property string $descripcion
 *
 * @package App\Models
 */
class Caneve extends Model
{
	protected $table = 'caneve';
	protected $primaryKey = 'codcan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcan' => 'int',
		'codeve' => 'int',
		'moteve' => 'int'
	];

	protected $dates = [
		'feccan'
	];

	protected $fillable = [
		'codeve',
		'feccan',
		'moteve',
		'descripcion'
	];
}
