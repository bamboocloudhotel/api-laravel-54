<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estcac
 * 
 * @property Carbon $fecha
 * @property int $motcan
 * @property int $unidad
 *
 * @package App\Models
 */
class Estcac extends Model
{
	protected $table = 'estcac';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'motcan' => 'int',
		'unidad' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'motcan',
		'unidad'
	];
}
