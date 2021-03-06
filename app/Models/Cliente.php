<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property string $cedula
 * @property int $tipdoc
 * @property string $lugexp
 * @property string $categoria
 * @property string $accion
 * @property string $nombre
 * @property string $sexo
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @property string $direccion
 * @property int $locdir
 * @property int $codpai
 * @property int $codciu
 * @property Carbon $fecnac
 * @property int $locnac
 * @property int $codnac
 * @property int $codpro
 * @property Carbon $ultest
 * @property int $numest
 * @property Carbon $feccre
 * @property int $tipcli
 * @property string $credito
 * @property string $tipcre
 * @property float $cupo
 * @property int $diaven
 * @property string $exento
 * @property string $cuepla
 * @property string $clides
 * @property string $actint
 * @property string $tipinf
 * @property string $observacion
 * @property string $soundphone
 * @property string $estado
 * @property string $estsis
 * @property int $ciudades_dian
 * @property string $cat_caja
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $tipo_regimen_dian
 * @property string $emailfe
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'clientes';
	protected $primaryKey = 'cedula';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipdoc' => 'int',
		'locdir' => 'int',
		'codpai' => 'int',
		'codciu' => 'int',
		'locnac' => 'int',
		'codnac' => 'int',
		'codpro' => 'int',
		'numest' => 'int',
		'tipcli' => 'int',
		'cupo' => 'float',
		'diaven' => 'int',
		'ciudades_dian' => 'int'
	];

	protected $dates = [
		'fecnac',
		'ultest',
		'feccre'
	];

	protected $fillable = [
		'tipdoc',
		'lugexp',
		'categoria',
		'accion',
		'nombre',
		'sexo',
		'telefono1',
		'telefono2',
		'email',
		'direccion',
		'locdir',
		'codpai',
		'codciu',
		'fecnac',
		'locnac',
		'codnac',
		'codpro',
		'ultest',
		'numest',
		'feccre',
		'tipcli',
		'credito',
		'tipcre',
		'cupo',
		'diaven',
		'exento',
		'cuepla',
		'clides',
		'actint',
		'tipinf',
		'observacion',
		'soundphone',
		'estado',
		'estsis',
		'ciudades_dian',
		'cat_caja',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		'tipo_regimen_dian',
		'emailfe'
	];
}
