<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Confre
 * 
 * @property int $id
 * @property int $numres
 * @property Carbon $fecha
 * @property int $codusu
 * @property string $email
 * @property string $carfec
 * @property string $encabezado
 * @property string $saludo
 * @property string $datos
 * @property string $polcan
 * @property string $polnoshow
 * @property string $costos
 * @property string $horas
 * @property string $notas
 * @property string $firma
 * @property string $mailuid
 * @property Carbon $fecent
 * @property string $diainf
 * @property string $estado
 *
 * @package App\Models
 */
class Confre extends Model
{
	protected $table = 'confres';
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecent'
	];

	protected $fillable = [
		'numres',
		'fecha',
		'codusu',
		'email',
		'carfec',
		'encabezado',
		'saludo',
		'datos',
		'polcan',
		'polnoshow',
		'costos',
		'horas',
		'notas',
		'firma',
		'mailuid',
		'fecent',
		'diainf',
		'estado'
	];
}
