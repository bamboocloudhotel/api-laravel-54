<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecdSeven
 * 
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property Carbon $fechac
 *
 * @package App\Models
 */
class RecdSeven extends Model
{
	protected $table = 'recd_seven';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fechac'
	];

	protected $fillable = [
		'brec',
		'rec_seven',
		'fechac'
	];
}
