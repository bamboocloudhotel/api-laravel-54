<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CxcSevenlog
 * 
 * @property int $cons
 * @property string $bfac
 * @property string $cxcws
 * @property Carbon $fechac
 *
 * @package App\Models
 */
class CxcSevenlog extends Model
{
	protected $table = 'cxc_sevenlog';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fechac'
	];

	protected $fillable = [
		'bfac',
		'cxcws',
		'fechac'
	];
}
