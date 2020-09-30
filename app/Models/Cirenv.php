<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cirenv
 * 
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $email
 * @property string $mailuid
 * @property string $diainf
 * @property Carbon $fecent
 * @property string $estado
 *
 * @package App\Models
 */
class Cirenv extends Model
{
	protected $table = 'cirenv';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'numfac' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecent'
	];

	protected $fillable = [
		'prefac',
		'numfac',
		'codusu',
		'fecha',
		'email',
		'mailuid',
		'diainf',
		'fecent',
		'estado'
	];
}
