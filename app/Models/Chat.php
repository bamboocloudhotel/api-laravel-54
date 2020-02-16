<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chat
 * 
 * @property int $id
 * @property int $usuone
 * @property int $usutwo
 * @property int $ususay
 * @property int $datemes
 * @property string $message
 * @property string $status
 *
 * @package App\Models
 */
class Chat extends Model
{
	protected $table = 'chat';
	public $timestamps = false;

	protected $casts = [
		'usuone' => 'int',
		'usutwo' => 'int',
		'ususay' => 'int',
		'datemes' => 'int'
	];

	protected $fillable = [
		'usuone',
		'usutwo',
		'ususay',
		'datemes',
		'message',
		'status'
	];
}
