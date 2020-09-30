<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recegr
 * 
 * @property int $numegr
 * @property string $cedula
 * @property string $nombre
 * @property string $direccion
 * @property string $ciudad
 * @property string $telefono
 * @property Carbon $fecha
 * @property int $codcaj
 * @property int $codusu
 * @property int $codcar
 * @property int $codven
 * @property string $nota
 * @property string $estado
 *
 * @package App\Models
 */
class Recegr extends Model
{
	protected $table = 'recegr';
	protected $primaryKey = 'numegr';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numegr' => 'int',
		'codcaj' => 'int',
		'codusu' => 'int',
		'codcar' => 'int',
		'codven' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'cedula',
		'nombre',
		'direccion',
		'ciudad',
		'telefono',
		'fecha',
		'codcaj',
		'codusu',
		'codcar',
		'codven',
		'nota',
		'estado'
	];
}
