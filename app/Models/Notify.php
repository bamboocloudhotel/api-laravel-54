<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notify
 * 
 * @property int $id
 * @property int $codusu
 * @property string $keyname
 * @property string $option1
 *
 * @package App\Models
 */
class Notify extends Model
{
	protected $table = 'notify';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'codusu',
		'keyname',
		'option1'
	];
}
