<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaObligado
 * 
 * @property int $id
 * @property bool $adjuntarPDF
 * @property string $correoDistribucion
 * @property string $telefonoCelular
 * @property bool $usaSucursales
 * @property int $tipoIdentificacion
 * @property string $numeroIdentificacion
 * @property string $codigoVerificacion
 * @property string $usuarioFE
 * @property int $codigoCiudad
 * @property int $codigoPais
 * @property int $codigoDept
 * @property int $tipoContribuyente
 * @property int $tipoRegimen
 * @property string $NCPrefijo
 * @property int $NCIni
 * @property int $NCFin
 * @property string $NDPrefijo
 * @property int $NDIni
 * @property int $NDFin
 *
 * @package App\Models
 */
class PtesaObligado extends Model
{
	protected $table = 'ptesa_obligados';
	public $timestamps = false;

	protected $casts = [
		'adjuntarPDF' => 'bool',
		'usaSucursales' => 'bool',
		'tipoIdentificacion' => 'int',
		'codigoCiudad' => 'int',
		'codigoPais' => 'int',
		'codigoDept' => 'int',
		'tipoContribuyente' => 'int',
		'tipoRegimen' => 'int',
		'NCIni' => 'int',
		'NCFin' => 'int',
		'NDIni' => 'int',
		'NDFin' => 'int'
	];

	protected $fillable = [
		'adjuntarPDF',
		'correoDistribucion',
		'telefonoCelular',
		'usaSucursales',
		'tipoIdentificacion',
		'numeroIdentificacion',
		'codigoVerificacion',
		'usuarioFE',
		'codigoCiudad',
		'codigoPais',
		'codigoDept',
		'tipoContribuyente',
		'tipoRegimen',
		'NCPrefijo',
		'NCIni',
		'NCFin',
		'NDPrefijo',
		'NDIni',
		'NDFin'
	];
}
