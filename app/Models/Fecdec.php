<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fecdec
 * 
 * @property int $id
 * @property string $digito
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Fecdec extends Model
{
	protected $table = 'fecdec';
	public $timestamps = false;

	protected $dates = [
		'fecini',
		'fecfin',
		'fecha'
	];

	protected $fillable = [
		'digito',
		'fecini',
		'fecfin',
		'fecha'
	];
}
