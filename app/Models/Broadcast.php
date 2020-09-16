<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Broadcast
 * 
 * @property int $id
 * @property int $codusu
 * @property string $message
 * @property string $sended
 *
 * @package App\Models
 */
class Broadcast extends Model
{
	protected $table = 'broadcast';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'codusu',
		'message',
		'sended'
	];
}
