<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Concue
 * 
 * @property int $numfol
 * @property int $codcar
 * @property int $numcue
 *
 * @package App\Models
 */
class Concue extends Model
{
	protected $table = 'concue';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codcar' => 'int',
		'numcue' => 'int'
	];

	protected $fillable = [
		'numcue'
	];
}
