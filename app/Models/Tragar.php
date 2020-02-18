<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tragar
 * 
 * @property int $resini
 * @property int $resfin
 * @property string $celini
 * @property string $celfin
 * @property int $numrec
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codusu
 *
 * @package App\Models
 */
class Tragar extends Model
{
	protected $table = 'tragar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'resini' => 'int',
		'resfin' => 'int',
		'numrec' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'resini',
		'resfin',
		'celini',
		'celfin',
		'numrec',
		'fecha',
		'hora',
		'codusu'
	];
}
