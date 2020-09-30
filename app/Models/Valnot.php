<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Valnot
 * 
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property string $nota
 *
 * @package App\Models
 */
class Valnot extends Model
{
	protected $table = 'valnot';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numcue' => 'int',
		'item' => 'int'
	];

	protected $fillable = [
		'nota'
	];
}
