<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nitcon
 * 
 * @property string $celini
 * @property string $celfin
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $hora
 * @property string $tabla
 * @property int $codigo
 *
 * @package App\Models
 */
class Nitcon extends Model
{
	protected $table = 'nitcon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'codigo' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'celini',
		'celfin',
		'codusu',
		'fecha',
		'hora',
		'tabla',
		'codigo'
	];
}
