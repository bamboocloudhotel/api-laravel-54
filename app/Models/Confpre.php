<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Confpre
 * 
 * @property int $id
 * @property string $polcan
 * @property string $polnoshow
 * @property string $costos
 * @property string $horas
 * @property string $notas
 *
 * @package App\Models
 */
class Confpre extends Model
{
	protected $table = 'confpre';
	public $timestamps = false;

	protected $fillable = [
		'polcan',
		'polnoshow',
		'costos',
		'horas',
		'notas'
	];
}
