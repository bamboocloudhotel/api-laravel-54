<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pref
 * 
 * @property int $codusu
 * @property string $key_name
 * @property string $value
 *
 * @package App\Models
 */
class Pref extends Model
{
	protected $table = 'prefs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'value'
	];
}
