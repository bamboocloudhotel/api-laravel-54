<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Camestahab
 * 
 * @property int $id
 * @property int $time
 * @property int $numhab
 * @property int $codestant
 * @property int $codestdes
 *
 * @package App\Models
 */
class Camestahab extends Model
{
	protected $table = 'camestahab';
	public $timestamps = false;

	protected $casts = [
		'time' => 'int',
		'numhab' => 'int',
		'codestant' => 'int',
		'codestdes' => 'int'
	];

	protected $fillable = [
		'time',
		'numhab',
		'codestant',
		'codestdes'
	];
}
