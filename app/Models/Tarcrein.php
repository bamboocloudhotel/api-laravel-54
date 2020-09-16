<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarcrein
 * 
 * @property int $id
 * @property int $numfol
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $tipo
 * @property string $numero
 * @property string $numero_mask
 * @property int $codseg
 * @property Carbon $fecven
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $pais
 * @property string $telefono
 * @property string $observaciones
 *
 * @package App\Models
 */
class Tarcrein extends Model
{
	protected $table = 'tarcrein';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codusu' => 'int',
		'codseg' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecven'
	];

	protected $fillable = [
		'numfol',
		'codusu',
		'fecha',
		'tipo',
		'numero',
		'numero_mask',
		'codseg',
		'fecven',
		'nombre',
		'direccion',
		'ciudad',
		'codigo_postal',
		'pais',
		'telefono',
		'observaciones'
	];
}
