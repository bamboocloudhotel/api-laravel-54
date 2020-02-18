<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hiscaj
 * 
 * @property int $numero
 * @property int $codcaj
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $hora
 * @property string $estado
 *
 * @package App\Models
 */
class Hiscaj extends Model
{
	protected $table = 'hiscaj';
	protected $primaryKey = 'numero';
	public $timestamps = false;

	protected $casts = [
		'codcaj' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'codcaj',
		'codusu',
		'fecha',
		'hora',
		'estado'
	];
}
