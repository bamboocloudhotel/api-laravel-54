<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acuinf
 * 
 * @property int $gruest
 * @property float $mes
 * @property float $ano
 *
 * @package App\Models
 */
class Acuinf extends Model
{
	protected $table = 'acuinf';
	protected $primaryKey = 'gruest';
	public $timestamps = false;

	protected $casts = [
		'mes' => 'float',
		'ano' => 'float'
	];

	protected $fillable = [
		'mes',
		'ano'
	];
}
