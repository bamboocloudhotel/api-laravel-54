<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Scheduler
 * 
 * @property int $id
 * @property int $timestart
 * @property int $events_id
 * @property int $codusu
 * @property string $tipo
 * @property string $status
 *
 * @package App\Models
 */
class Scheduler extends Model
{
	protected $table = 'scheduler';
	public $timestamps = false;

	protected $casts = [
		'timestart' => 'int',
		'events_id' => 'int',
		'codusu' => 'int'
	];

	protected $fillable = [
		'timestart',
		'events_id',
		'codusu',
		'tipo',
		'status'
	];
}
