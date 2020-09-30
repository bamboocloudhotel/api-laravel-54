<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estapld
 * 
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $codpla
 * @property int $tippla
 * @property string $tipper
 * @property int $numadu
 * @property int $numnin
 * @property int $numinf
 * @property float $valor
 *
 * @package App\Models
 */
class Estapld extends Model
{
	protected $table = 'estapld';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codpla' => 'int',
		'tippla' => 'int',
		'numadu' => 'int',
		'numnin' => 'int',
		'numinf' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'numfol',
		'codpla',
		'tippla',
		'tipper',
		'numadu',
		'numnin',
		'numinf',
		'valor'
	];
}
