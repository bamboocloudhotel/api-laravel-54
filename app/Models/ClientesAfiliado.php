<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientesAfiliado
 * 
 * @property int $cons
 * @property string $cod_infra
 * @property string $servicio
 * @property string $categoria
 * @property string $ran_edad
 * @property string $genero
 * @property int $num_pers
 * @property int $participantes
 * @property int $num_usos
 * @property Carbon $fechatramite
 * @property string $iptramite
 *
 * @package App\Models
 */
class ClientesAfiliado extends Model
{
	protected $table = 'clientes_afiliados';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'num_pers' => 'int',
		'participantes' => 'int',
		'num_usos' => 'int'
	];

	protected $dates = [
		'fechatramite'
	];

	protected $fillable = [
		'cod_infra',
		'servicio',
		'categoria',
		'ran_edad',
		'genero',
		'num_pers',
		'participantes',
		'num_usos',
		'fechatramite',
		'iptramite'
	];
}
