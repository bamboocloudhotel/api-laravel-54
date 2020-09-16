<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Magentum
 * 
 * @property int $id
 * @property int $codusu
 * @property string $token
 *
 * @package App\Models
 */
class Magentum extends Model
{
	protected $table = 'magenta';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'codusu',
		'token'
	];
}
