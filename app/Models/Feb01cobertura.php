<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feb01cobertura
 * 
 * @property string $PERSON_TRABAJADOR_V_TIPOID
 * @property string $PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION
 * @property string $PERSON_V_TIPOID
 * @property string $PERSON_V_IDENTIFICACION
 * @property string $PERSON_V_PRIAPE
 * @property string $PERSON_V_SEGAPE
 * @property string $PERSON_V_PRINOM
 * @property string $PERSON_V_SEGNOM
 * @property string $PERSON_V_RAZSOC
 * @property string $PERSON_D_NACIMIENTO
 * @property string $PERSON_V_GENERO
 * @property string $PERSON_V_DIRECCION_RES
 * @property int $PERSON_N_CODDPTO_RES
 * @property int $PERSON_N_CODMUN_RES
 * @property string $PERSON_N_BARRIO_RES
 * @property int $PERSON_N_CELULAR_1
 * @property int $PERSON_N_CELULAR_2
 * @property string $PERSON_V_TEL_FIJO_RES
 * @property string $PERSON_V_HABEAS_DATA
 * @property string $PERSON_V_TIPO_PERSONA
 * @property string $PERSON_V_CORREO_1
 * @property string $PERSON_V_CORREO_2
 * @property string $PERSON_V_FACEBOOK
 * @property string $PERSON_V_LINKEDLN
 * @property string $PERSON_V_TWITTER
 * @property string $PERSON_V_OTRAS_REDES
 * @property int $COBCLI_N_PRODUCTO
 * @property int $COBCLI_N_INFRAESTRUCTURA
 * @property string $COBCLI_D_FECHA_SERVICIO
 * @property string $COBCLI_V_ROL_CLIENTE
 * @property string $COBCLI_V_CATEGORIA
 * @property float $COBCLI_N_VALOR_VENTA
 * @property string $COBCLI_V_TIPO_SUB
 * @property float $COBCLI_N_SUBSIDIO
 * @property int $COBCLI_N_USOS
 * @property int $COBCLI_N_PARTICIPANTES
 * @property string $V_VINCULACION
 * @property Carbon $FECHA_PROCESO
 *
 * @package App\Models
 */
class Feb01cobertura extends Model
{
	protected $table = 'feb01cobertura';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PERSON_N_CODDPTO_RES' => 'int',
		'PERSON_N_CODMUN_RES' => 'int',
		'PERSON_N_CELULAR_1' => 'int',
		'PERSON_N_CELULAR_2' => 'int',
		'COBCLI_N_PRODUCTO' => 'int',
		'COBCLI_N_INFRAESTRUCTURA' => 'int',
		'COBCLI_N_VALOR_VENTA' => 'float',
		'COBCLI_N_SUBSIDIO' => 'float',
		'COBCLI_N_USOS' => 'int',
		'COBCLI_N_PARTICIPANTES' => 'int'
	];

	protected $dates = [
		'FECHA_PROCESO'
	];

	protected $fillable = [
		'PERSON_TRABAJADOR_V_TIPOID',
		'PERSON_TRABAJADOR_BENEF_V_IDENTIFICACION',
		'PERSON_V_TIPOID',
		'PERSON_V_IDENTIFICACION',
		'PERSON_V_PRIAPE',
		'PERSON_V_SEGAPE',
		'PERSON_V_PRINOM',
		'PERSON_V_SEGNOM',
		'PERSON_V_RAZSOC',
		'PERSON_D_NACIMIENTO',
		'PERSON_V_GENERO',
		'PERSON_V_DIRECCION_RES',
		'PERSON_N_CODDPTO_RES',
		'PERSON_N_CODMUN_RES',
		'PERSON_N_BARRIO_RES',
		'PERSON_N_CELULAR_1',
		'PERSON_N_CELULAR_2',
		'PERSON_V_TEL_FIJO_RES',
		'PERSON_V_HABEAS_DATA',
		'PERSON_V_TIPO_PERSONA',
		'PERSON_V_CORREO_1',
		'PERSON_V_CORREO_2',
		'PERSON_V_FACEBOOK',
		'PERSON_V_LINKEDLN',
		'PERSON_V_TWITTER',
		'PERSON_V_OTRAS_REDES',
		'COBCLI_N_PRODUCTO',
		'COBCLI_N_INFRAESTRUCTURA',
		'COBCLI_D_FECHA_SERVICIO',
		'COBCLI_V_ROL_CLIENTE',
		'COBCLI_V_CATEGORIA',
		'COBCLI_N_VALOR_VENTA',
		'COBCLI_V_TIPO_SUB',
		'COBCLI_N_SUBSIDIO',
		'COBCLI_N_USOS',
		'COBCLI_N_PARTICIPANTES',
		'V_VINCULACION',
		'FECHA_PROCESO'
	];
}
