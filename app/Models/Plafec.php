<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plafec
 * 
 * @property int $codpla
 * @property int $codcla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $observacion
 *
 * @package App\Models
 */
class Plafec extends Model
{
	protected $table = 'plafec';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int',
		'codcla' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'observacion'
	];
}
