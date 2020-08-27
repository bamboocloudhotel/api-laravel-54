<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingreso
 * 
 * @property int $id
 * @property int $codusu
 * @property int $hora
 * @property string $ipaddress
 * @property string $remote_host
 *
 * @package App\Models
 */
class Ingreso extends Model
{
	protected $table = 'ingreso';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'hora' => 'int'
	];

	protected $fillable = [
		'codusu',
		'hora',
		'ipaddress',
		'remote_host'
	];
}
