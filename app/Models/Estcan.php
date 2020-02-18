<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estcan
 * 
 * @property Carbon $fecha
 * @property int $codsuc
 * @property int $unidad
 *
 * @package App\Models
 */
class Estcan extends Model
{
	protected $table = 'estcan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codsuc' => 'int',
		'unidad' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'codsuc',
		'unidad'
	];
}
