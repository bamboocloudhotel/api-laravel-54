<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Protect
 * 
 * @property int $id
 * @property int $codusu
 * @property string $source
 * @property string $field
 * @property string $value
 *
 * @package App\Models
 */
class Protect extends Model
{
	protected $table = 'protects';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'codusu',
		'source',
		'field',
		'value'
	];
}
