<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallet
 * 
 * @property int $id
 * @property int $numres
 * @property string $token
 * @property string $url
 * @property Carbon $fecha
 * @property Carbon $lasmod
 * @property int $codusu
 * @property string $estado
 *
 * @package App\Models
 */
class Wallet extends Model
{
	protected $table = 'wallet';
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'lasmod'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'numres',
		'token',
		'url',
		'fecha',
		'lasmod',
		'codusu',
		'estado'
	];
}
