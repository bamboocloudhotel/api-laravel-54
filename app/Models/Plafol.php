<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plafol
 * 
 * @property int $numfol
 * @property int $numpla
 * @property int $codpla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property float $subsidio
 *
 * @package App\Models
 */
class Plafol extends Model
{
	protected $table = 'plafol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numpla' => 'int',
		'codpla' => 'int',
		'subsidio' => 'float'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'fecini',
		'fecfin',
		'subsidio'
	];
}
