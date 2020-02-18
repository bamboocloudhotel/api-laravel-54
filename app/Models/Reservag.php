<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservag
 * 
 * @property int $numres
 * @property string $nomgru
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nit
 * @property string $nitage
 * @property int $locpro
 * @property int $codpai
 * @property int $codciu
 * @property int $locdes
 * @property int $paides
 * @property int $ciudes
 * @property float $pordes
 * @property int $codtra
 * @property int $trasal
 * @property int $codmot
 * @property int $tipres
 * @property int $codcan
 * @property Carbon $fecres
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $hora
 * @property string $observacion
 * @property int $numrec
 * @property int $forpag
 * @property string $estado
 * @property string $tippro
 * @property string $tipgar
 * @property int $codven
 * @property string $idresweb
 * @property string $idcanal
 * @property string $idclifre
 *
 * @package App\Models
 */
class Reservag extends Model
{
	protected $table = 'reservag';
	protected $primaryKey = 'numres';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'tipdoc' => 'int',
		'locpro' => 'int',
		'codpai' => 'int',
		'codciu' => 'int',
		'locdes' => 'int',
		'paides' => 'int',
		'ciudes' => 'int',
		'pordes' => 'float',
		'codtra' => 'int',
		'trasal' => 'int',
		'codmot' => 'int',
		'tipres' => 'int',
		'codcan' => 'int',
		'numrec' => 'int',
		'forpag' => 'int',
		'codven' => 'int'
	];

	protected $dates = [
		'fecres',
		'feclle',
		'fecsal'
	];

	protected $fillable = [
		'nomgru',
		'tipdoc',
		'cedula',
		'nit',
		'nitage',
		'locpro',
		'codpai',
		'codciu',
		'locdes',
		'paides',
		'ciudes',
		'pordes',
		'codtra',
		'trasal',
		'codmot',
		'tipres',
		'codcan',
		'fecres',
		'feclle',
		'fecsal',
		'hora',
		'observacion',
		'numrec',
		'forpag',
		'estado',
		'tippro',
		'tipgar',
		'codven',
		'idresweb',
		'idcanal',
		'idclifre'
	];
}
