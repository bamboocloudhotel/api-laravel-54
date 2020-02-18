<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carlim
 * 
 * @property int $numfol
 * @property int $numcue
 * @property int $codgru
 * @property string $tipo
 * @property float $limite
 * @property int $cuedes
 *
 * @package App\Models
 */
class Carlim extends Model
{
	protected $table = 'carlim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numcue' => 'int',
		'codgru' => 'int',
		'limite' => 'float',
		'cuedes' => 'int'
	];

	protected $fillable = [
		'numfol',
		'numcue',
		'codgru',
		'tipo',
		'limite',
		'cuedes'
	];
}
