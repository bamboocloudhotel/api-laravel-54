<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aura
 * 
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $comprob
 * @property int $numero
 *
 * @package App\Models
 */
class Aura extends Model
{
	protected $table = 'aura';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'comprob',
		'numero'
	];
}
