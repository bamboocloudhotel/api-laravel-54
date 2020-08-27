<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aplint
 * 
 * @property int $codigo
 * @property int $codint
 * @property string $tipo
 * @property Carbon $fecini
 * @property Carbon $fecfin
 *
 * @package App\Models
 */
class Aplint extends Model
{
	protected $table = 'aplint';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'codint' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'codint',
		'tipo',
		'fecini',
		'fecfin'
	];
}
