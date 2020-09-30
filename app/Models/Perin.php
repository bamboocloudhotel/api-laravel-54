<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Perin
 * 
 * @property int $id
 * @property int $numfol
 * @property Carbon $fecha
 * @property int $codusu
 * @property string $email
 * @property string $mailuid
 * @property Carbon $fecent
 * @property string $diainf
 * @property string $estado
 *
 * @package App\Models
 */
class Perin extends Model
{
	protected $table = 'perins';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecent'
	];

	protected $fillable = [
		'numfol',
		'fecha',
		'codusu',
		'email',
		'mailuid',
		'fecent',
		'diainf',
		'estado'
	];
}
