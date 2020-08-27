<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cirpag
 * 
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property string $token
 * @property int $codusu
 * @property float $saldo
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 *
 * @package App\Models
 */
class Cirpag extends Model
{
	protected $table = 'cirpag';
	public $timestamps = false;

	protected $casts = [
		'numfac' => 'int',
		'codusu' => 'int',
		'saldo' => 'float'
	];

	protected $dates = [
		'modified_in'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'prefac',
		'numfac',
		'token',
		'codusu',
		'saldo',
		'url',
		'modified_in',
		'estado'
	];
}
