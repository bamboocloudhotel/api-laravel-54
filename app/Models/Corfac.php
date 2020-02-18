<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Corfac
 * 
 * @property int $id
 * @property string $preini
 * @property int $numini
 * @property int $folini
 * @property string $prefin
 * @property int $numfin
 * @property int $folfin
 * @property string $tipo
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codusu
 * @property string $estado
 *
 * @package App\Models
 */
class Corfac extends Model
{
	protected $table = 'corfac';
	public $timestamps = false;

	protected $casts = [
		'numini' => 'int',
		'folini' => 'int',
		'numfin' => 'int',
		'folfin' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'preini',
		'numini',
		'folini',
		'prefin',
		'numfin',
		'folfin',
		'tipo',
		'fecha',
		'hora',
		'codusu',
		'estado'
	];
}
