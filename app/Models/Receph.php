<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Receph
 * 
 * @property string $comprob
 * @property int $numero
 * @property Carbon $fecint
 * @property Carbon $fecha
 * @property string $cuenta
 * @property string $pide_nit
 * @property string $pide_base
 * @property string $pide_fact
 * @property string $pide_centro
 * @property string $nit
 * @property float $centro_costo
 * @property float $valor
 * @property string $deb_cre
 * @property string $descripcion
 * @property string $tipo_doc
 * @property float $numero_doc
 * @property float $base_grab
 * @property string $conciliado
 * @property Carbon $f_vence
 *
 * @package App\Models
 */
class Receph extends Model
{
	protected $table = 'receph';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero' => 'int',
		'centro_costo' => 'float',
		'valor' => 'float',
		'numero_doc' => 'float',
		'base_grab' => 'float'
	];

	protected $dates = [
		'fecint',
		'fecha',
		'f_vence'
	];

	protected $fillable = [
		'comprob',
		'numero',
		'fecint',
		'fecha',
		'cuenta',
		'pide_nit',
		'pide_base',
		'pide_fact',
		'pide_centro',
		'nit',
		'centro_costo',
		'valor',
		'deb_cre',
		'descripcion',
		'tipo_doc',
		'numero_doc',
		'base_grab',
		'conciliado',
		'f_vence'
	];
}
