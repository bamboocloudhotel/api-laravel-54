<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Firewall
 * 
 * @property int $id
 * @property int $codusu
 * @property string $ipaddress
 *
 * @package App\Models
 */
class Firewall extends Model
{
	protected $table = 'firewall';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'codusu',
		'ipaddress'
	];
}
