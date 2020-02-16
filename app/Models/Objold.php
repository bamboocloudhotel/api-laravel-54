<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Objold
 * 
 * @property int $id
 * @property string $cedula
 * @property Carbon $fecha
 * @property int $codtip
 * @property int $codcam
 * @property int $codusu
 * @property Carbon $fecent
 * @property int $usuent
 * @property string $observaciones
 * @property string $estado
 *
 * @package App\Models
 */
class Objold extends Model
{
	protected $table = 'objold';
	public $timestamps = false;

	protected $casts = [
		'codtip' => 'int',
		'codcam' => 'int',
		'codusu' => 'int',
		'usuent' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecent'
	];

	protected $fillable = [
		'cedula',
		'fecha',
		'codtip',
		'codcam',
		'codusu',
		'fecent',
		'usuent',
		'observaciones',
		'estado'
	];
}
