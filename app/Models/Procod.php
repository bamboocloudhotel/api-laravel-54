<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Procod
 * 
 * @property int $codpro
 * @property int $codint
 * @property string $nit
 * @property string $codigo
 * @property int $pordes
 * @property Carbon $fecini
 * @property Carbon $fecfin
 *
 * @package App\Models
 */
class Procod extends Model
{
	protected $table = 'procod';
	protected $primaryKey = 'codpro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpro' => 'int',
		'codint' => 'int',
		'pordes' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'codint',
		'nit',
		'codigo',
		'pordes',
		'fecini',
		'fecfin'
	];
}
