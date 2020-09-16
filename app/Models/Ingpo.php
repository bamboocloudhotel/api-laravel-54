<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingpo
 * 
 * @property int $id
 * @property int $salon_id
 * @property string $prefac
 * @property int $numfac
 * @property Carbon $fecha
 * @property string $cedula
 * @property int $forpag
 * @property float $valor
 *
 * @package App\Models
 */
class Ingpo extends Model
{
	protected $table = 'ingpos';
	public $timestamps = false;

	protected $casts = [
		'salon_id' => 'int',
		'numfac' => 'int',
		'forpag' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'salon_id',
		'prefac',
		'numfac',
		'fecha',
		'cedula',
		'forpag',
		'valor'
	];
}
