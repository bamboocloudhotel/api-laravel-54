<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perusu
 * 
 * @property int $codusu
 * @property string $codper
 *
 * @package App\Models
 */
class Perusu extends Model
{
	protected $table = 'perusu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];
}
