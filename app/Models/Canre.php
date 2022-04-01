<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Canre
 * 
 * @property int $codcan
 * @property int $numres
 * @property Carbon $feccan
 * @property string $hora
 * @property int $motcan
 * @property string $descripcion
 * @property string $solicitada
 * @property int $codusu
 *
 * @package App\Models
 */
class Canre extends Model
{
    protected $connection = 'on_the_fly';
	protected $table = 'canres';
	protected $primaryKey = 'codcan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcan' => 'int',
		'numres' => 'int',
		'motcan' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'feccan'
	];

	protected $fillable = [
		'codcan',
		'numres',
		'feccan',
		'hora',
		'motcan',
		'descripcion',
		'solicitada',
		'codusu'
	];
}
