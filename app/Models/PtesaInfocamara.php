<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaInfocamara
 * 
 * @property int $id
 * @property string $barrio
 * @property string $ciudad
 * @property string $codigoPais
 * @property string $codigoSucursal
 * @property string $departamento
 * @property string $direccion
 * @property bool $esEstablecimiento
 * @property string $nombreEstalecimiento
 * @property string $nombreSucursal
 * @property string $numeroMatriculaMercantil
 * @property string $pais
 * @property string $tipoEstablecimiento
 * @property int $zonaPostal
 *
 * @package App\Models
 */
class PtesaInfocamara extends Model
{
	protected $table = 'ptesa_infocamara';
	public $timestamps = false;

	protected $casts = [
		'esEstablecimiento' => 'bool',
		'zonaPostal' => 'int'
	];

	protected $fillable = [
		'barrio',
		'ciudad',
		'codigoPais',
		'codigoSucursal',
		'departamento',
		'direccion',
		'esEstablecimiento',
		'nombreEstalecimiento',
		'nombreSucursal',
		'numeroMatriculaMercantil',
		'pais',
		'tipoEstablecimiento',
		'zonaPostal'
	];
}
