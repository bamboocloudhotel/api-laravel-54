<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plasticine
 * 
 * @property int $id
 * @property int $numres
 * @property string $clave
 * @property int $codusu
 * @property Carbon $fecha
 * @property Carbon $modified_in
 * @property string $tipdoc
 * @property string $cedula
 * @property string $lugexp
 * @property string $priape
 * @property string $segape
 * @property string $nombre
 * @property int $locnac
 * @property Carbon $fecnac
 * @property string $direccion
 * @property int $locdir
 * @property string $telefono
 * @property string $email
 * @property string $nit
 * @property string $nomemp
 * @property string $diremp
 * @property int $locemp
 * @property string $telemp
 * @property string $emaemp
 * @property int $locpro
 * @property int $codtra
 * @property int $codmot
 * @property string $hora
 * @property string $nota
 *
 * @package App\Models
 */
class Plasticine extends Model
{
	protected $table = 'plasticine';
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'codusu' => 'int',
		'locnac' => 'int',
		'locdir' => 'int',
		'locemp' => 'int',
		'locpro' => 'int',
		'codtra' => 'int',
		'codmot' => 'int'
	];

	protected $dates = [
		'fecha',
		'modified_in',
		'fecnac'
	];

	protected $fillable = [
		'numres',
		'clave',
		'codusu',
		'fecha',
		'modified_in',
		'tipdoc',
		'cedula',
		'lugexp',
		'priape',
		'segape',
		'nombre',
		'locnac',
		'fecnac',
		'direccion',
		'locdir',
		'telefono',
		'email',
		'nit',
		'nomemp',
		'diremp',
		'locemp',
		'telemp',
		'emaemp',
		'locpro',
		'codtra',
		'codmot',
		'hora',
		'nota'
	];
}
