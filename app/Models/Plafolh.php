<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plafolh
 * 
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $numpla
 * @property int $codpla
 * @property string $tipper
 * @property int $numper
 * @property string $adicional
 * @property Carbon $fecini
 * @property Carbon $fecfin
 *
 * @package App\Models
 */
class Plafolh extends Model
{
	protected $table = 'plafolh';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numpla' => 'int',
		'codpla' => 'int',
		'numper' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'fecha',
		'numfol',
		'numpla',
		'codpla',
		'tipper',
		'numper',
		'adicional',
		'fecini',
		'fecfin'
	];
}
