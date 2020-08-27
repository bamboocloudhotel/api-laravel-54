<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Eventsu
 * 
 * @property int $id
 * @property int $codusu
 * @property int $events_id
 *
 * @package App\Models
 */
class Eventsu extends Model
{
	protected $table = 'eventsu';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'events_id' => 'int'
	];

	protected $fillable = [
		'codusu',
		'events_id'
	];
}
