<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asteriskcdr
 * 
 * @property Carbon $calldate
 * @property string $uniqueid
 * @property string $trace
 * @property string $hora
 *
 * @package App\Models
 */
class Asteriskcdr extends Model
{
	protected $table = 'asteriskcdr';
	protected $primaryKey = 'uniqueid';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'calldate'
	];

	protected $fillable = [
		'calldate',
		'trace',
		'hora'
	];
}
