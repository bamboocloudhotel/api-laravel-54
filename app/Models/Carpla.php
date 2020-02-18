<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carpla
 * 
 * @property int $id
 * @property int $numfol
 * @property int $codpla
 * @property Carbon $fecha
 * @property int $numcue
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $hora
 * @property int $codusu
 * @property string $estado
 *
 * @package App\Models
 */
class Carpla extends Model
{
	protected $table = 'carpla';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codpla' => 'int',
		'numcue' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'numfol',
		'codpla',
		'fecha',
		'numcue',
		'fecini',
		'fecfin',
		'hora',
		'codusu',
		'estado'
	];
}
