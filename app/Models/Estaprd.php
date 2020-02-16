<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estaprd
 * 
 * @property Carbon $fecha
 * @property int $numfol
 * @property int $codpla
 * @property int $tippro
 * @property string $tipper
 * @property int $numadu
 * @property int $numnin
 * @property int $numinf
 * @property float $valor
 *
 * @package App\Models
 */
class Estaprd extends Model
{
	protected $table = 'estaprd';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codpla' => 'int',
		'tippro' => 'int',
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
		'tippro',
		'tipper',
		'numadu',
		'numnin',
		'numinf',
		'valor'
	];
}
