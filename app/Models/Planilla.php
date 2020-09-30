<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planilla
 * 
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $numfol
 * @property int $numcue
 * @property string $nomcad
 * @property string $nithot
 * @property string $hotel
 * @property string $resfac
 * @property int $numini
 * @property int $numfin
 * @property Carbon $fecfac
 * @property string $horfac
 * @property string $nombre
 * @property int $tipdoc
 * @property string $cedula
 * @property string $numhab
 * @property int $dif
 * @property string $direccion
 * @property string $ciudad
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $caja
 * @property string $planes
 * @property string $huesped
 * @property string $empresa
 * @property int $numadu
 * @property int $numnin
 * @property float $tocanogr
 * @property float $tocagr
 * @property float $tocagr16
 * @property float $tocagr10
 * @property float $totiva16
 * @property float $totiva10
 * @property float $totiva
 * @property float $totabo
 * @property float $total
 * @property float $saldo
 * @property float $basret
 * @property float $propina
 * @property int $codusu
 * @property string $svf
 * @property string $estado
 *
 * @package App\Models
 */
class Planilla extends Model
{
    protected $connection = 'hhotel5';
	protected $table = 'planilla';
	public $timestamps = false;

	protected $casts = [
		'numfac' => 'int',
		'numfol' => 'int',
		'numcue' => 'int',
		'numini' => 'int',
		'numfin' => 'int',
		'tipdoc' => 'int',
		'dif' => 'int',
		'numadu' => 'int',
		'numnin' => 'int',
		'tocanogr' => 'float',
		'tocagr' => 'float',
		'tocagr16' => 'float',
		'tocagr10' => 'float',
		'totiva16' => 'float',
		'totiva10' => 'float',
		'totiva' => 'float',
		'totabo' => 'float',
		'total' => 'float',
		'saldo' => 'float',
		'basret' => 'float',
		'propina' => 'float',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecfac',
		'feclle',
		'fecsal'
	];

	protected $fillable = [
		'prefac',
		'numfac',
		'numfol',
		'numcue',
		'nomcad',
		'nithot',
		'hotel',
		'resfac',
		'numini',
		'numfin',
		'fecfac',
		'horfac',
		'nombre',
		'tipdoc',
		'cedula',
		'numhab',
		'dif',
		'direccion',
		'ciudad',
		'feclle',
		'fecsal',
		'caja',
		'planes',
		'huesped',
		'empresa',
		'numadu',
		'numnin',
		'tocanogr',
		'tocagr',
		'tocagr16',
		'tocagr10',
		'totiva16',
		'totiva10',
		'totiva',
		'totabo',
		'total',
		'saldo',
		'basret',
		'propina',
		'codusu',
		'svf',
		'estado'
	];
}
