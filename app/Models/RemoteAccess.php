<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RemoteAccess
 * 
 * @property int $port
 * @property string $ip_address
 * @property int $started_at
 * @property string $status
 *
 * @package App\Models
 */
class RemoteAccess extends Model
{
	protected $table = 'remote_access';
	protected $primaryKey = 'port';
	public $timestamps = false;

	protected $casts = [
		'started_at' => 'int'
	];

	protected $fillable = [
		'ip_address',
		'started_at',
		'status'
	];
}
