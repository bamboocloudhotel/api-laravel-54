<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Facseven
 * 
 * @property int $consc
 * @property string $bfac
 * @property string $fac_seven
 * @property Carbon $fechac
 * @property string $fac_cont
 *
 * @package App\Models
 */
class Facseven extends Model
{
	protected $table = 'facseven';
	protected $primaryKey = 'consc';
	public $timestamps = false;

	protected $dates = [
		'fechac'
	];

	protected $fillable = [
		'bfac',
		'fac_seven',
		'fechac',
		'fac_cont'
	];
}
