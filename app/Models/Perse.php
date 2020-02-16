<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Perse
 * 
 * @property int $id
 * @property int $numfol
 * @property string $clave
 * @property string $enaper
 * @property string $pueout
 * @property string $pueabo
 * @property int $codusu
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Perse extends Model
{
	protected $table = 'perse';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'numfol',
		'clave',
		'enaper',
		'pueout',
		'pueabo',
		'codusu',
		'fecha'
	];
}
