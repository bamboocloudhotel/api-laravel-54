<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReccSeven
 * 
 * @property int $cons
 * @property string $brec
 * @property string $rec_seven
 * @property string $nemero_seven
 * @property Carbon $fechac
 *
 * @package App\Models
 */
class ReccSeven extends Model
{
	protected $table = 'recc_seven';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fechac'
	];

	protected $fillable = [
		'brec',
		'rec_seven',
		'nemero_seven',
		'fechac'
	];
}
