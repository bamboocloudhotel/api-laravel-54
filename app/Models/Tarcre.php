<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarcre
 * 
 * @property int $id
 * @property int $numres
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $numero
 * @property string $numero_mask
 * @property string $nombre
 * @property string $grupal
 *
 * @package App\Models
 */
class Tarcre extends Model
{
	protected $table = 'tarcre';
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'numres',
		'codusu',
		'fecha',
		'tipo',
		'numero',
		'numero_mask',
		'nombre',
		'grupal'
	];
}
