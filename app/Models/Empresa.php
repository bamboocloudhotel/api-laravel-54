<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property string $nit
 * @property string $nombre
 * @property string $razsoc
 * @property int $locfac
 * @property string $dirfac
 * @property string $telfac
 * @property int $locdir
 * @property int $codpai
 * @property int $codciu
 * @property string $direccion
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property string $sitweb
 * @property string $encargado
 * @property int $codact
 * @property string $autoretenedor
 * @property string $tipreg
 * @property string $credito
 * @property string $tipcre
 * @property int $diaven
 * @property float $cupo
 * @property int $diacor
 * @property string $exento
 * @property string $cuepla
 * @property string $actint
 * @property string $observacion
 * @property int $codven
 * @property int $forpag
 * @property Carbon $feccre
 * @property string $soundphone
 * @property string $estsis
 * @property int $ciudades_dian
 *
 * @package App\Models
 */
class Empresa extends Model
{
	
	public $connection = 'on_the_fly';
	
	protected $table = 'empresas';
	protected $primaryKey = 'nit';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'locfac' => 'int',
		'locdir' => 'int',
		'codpai' => 'int',
		'codciu' => 'int',
		'codact' => 'int',
		'diaven' => 'int',
		'cupo' => 'float',
		'diacor' => 'int',
		'codven' => 'int',
		'forpag' => 'int',
		'ciudades_dian' => 'int'
	];

	protected $dates = [
		'feccre'
	];

	protected $fillable = [
		'nombre',
		'razsoc',
		'locfac',
		'dirfac',
		'telfac',
		'locdir',
		'codpai',
		'codciu',
		'direccion',
		'telefono',
		'fax',
		'email',
		'sitweb',
		'encargado',
		'codact',
		'autoretenedor',
		'tipreg',
		'credito',
		'tipcre',
		'diaven',
		'cupo',
		'diacor',
		'exento',
		'cuepla',
		'actint',
		'observacion',
		'codven',
		'forpag',
		'feccre',
		'soundphone',
		'estsis',
		'ciudades_dian'
	];
}
