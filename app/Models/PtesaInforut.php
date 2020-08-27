<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaInforut
 * 
 * @property int $id
 * @property string $barrio
 * @property string $ciudad
 * @property string $correoElectronico
 * @property string $departamento
 * @property string $digitoVerificacion
 * @property string $direccion
 * @property string $nit
 * @property string $nombreComercial
 * @property string $pais
 * @property string $razonSocial
 * @property string $responsabilidades
 * @property string $tipoContribuyente
 * @property string $tipoRegimen
 * @property string $usuarioAduanero
 *
 * @package App\Models
 */
class PtesaInforut extends Model
{
	protected $table = 'ptesa_inforut';
	public $timestamps = false;

	protected $fillable = [
		'barrio',
		'ciudad',
		'correoElectronico',
		'departamento',
		'digitoVerificacion',
		'direccion',
		'nit',
		'nombreComercial',
		'pais',
		'razonSocial',
		'responsabilidades',
		'tipoContribuyente',
		'tipoRegimen',
		'usuarioAduanero'
	];
}
