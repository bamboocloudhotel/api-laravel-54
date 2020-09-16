<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesre
 * 
 * @property int $numres
 * @property int $numero
 * @property string $mensaje
 * @property Carbon $fecha
 * @property string $hora
 * @property string $nomper
 * @property string $telper1
 * @property string $telper2
 *
 * @package App\Models
 */
class Mesre extends Model
{
	protected $table = 'mesres';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'numero' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'mensaje',
		'fecha',
		'hora',
		'nomper',
		'telper1',
		'telper2'
	];
}
