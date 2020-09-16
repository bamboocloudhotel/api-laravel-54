<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliseven
 * 
 * @property int $consc
 * @property string $bcliente
 * @property string $cli_seven
 * @property Carbon $fechac
 *
 * @package App\Models
 */
class Cliseven extends Model
{
	protected $table = 'cliseven';
	protected $primaryKey = 'consc';
	public $timestamps = false;

	protected $dates = [
		'fechac'
	];

	protected $fillable = [
		'bcliente',
		'cli_seven',
		'fechac'
	];
}
