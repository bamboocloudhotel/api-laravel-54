<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Perabo
 * 
 * @property int $id
 * @property int $numfol
 * @property string $cedula
 * @property string $token
 * @property string $ipaddress
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 *
 * @package App\Models
 */
class Perabo extends Model
{
	protected $table = 'perabo';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int'
	];

	protected $dates = [
		'modified_in'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'numfol',
		'cedula',
		'token',
		'ipaddress',
		'modified_in',
		'estado'
	];
}
