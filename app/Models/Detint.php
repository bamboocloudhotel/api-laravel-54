<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detint
 * 
 * @property int $codigo
 * @property int $numpla
 * @property int $codpla
 *
 * @package App\Models
 */
class Detint extends Model
{
	protected $table = 'detint';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'numpla' => 'int',
		'codpla' => 'int'
	];

	protected $fillable = [
		'codpla'
	];
}
