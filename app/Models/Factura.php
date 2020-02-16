<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 * 
 * @property string $prefac
 * @property int $numfac
 * @property int $numfol
 * @property int $numcue
 * @property string $nomcad
 * @property string $nithot
 * @property string $hotel
 * @property string $resfac
 * @property Carbon $fecres
 * @property int $numini
 * @property int $numfin
 * @property string $notreg
 * @property string $notica
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
 * @property float $tocagr8
 * @property float $tocagr16
 * @property float $tocagr10
 * @property float $totiva16
 * @property float $totiva10
 * @property float $totiva
 * @property float $totimp
 * @property float $totabo
 * @property float $total
 * @property float $saldo
 * @property float $basret
 * @property float $propina
 * @property string $nota
 * @property string $formas
 * @property Carbon $fecven
 * @property Carbon $fecgen
 * @property string $tipres
 * @property string $facalo
 * @property string $quien
 * @property int $genusu
 * @property int $canfac
 * @property int $codusu
 * @property string $svf
 * @property string $estado
 * @property float $totalsubsidio
 *
 * @package App\Models
 */
class Factura extends Model
{
	protected $table = 'factura';
	public $incrementing = false;
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
		'tocagr8' => 'float',
		'tocagr16' => 'float',
		'tocagr10' => 'float',
		'totiva16' => 'float',
		'totiva10' => 'float',
		'totiva' => 'float',
		'totimp' => 'float',
		'totabo' => 'float',
		'total' => 'float',
		'saldo' => 'float',
		'basret' => 'float',
		'propina' => 'float',
		'genusu' => 'int',
		'canfac' => 'int',
		'codusu' => 'int',
		'totalsubsidio' => 'float'
	];

	protected $dates = [
		'fecres',
		'fecfac',
		'feclle',
		'fecsal',
		'fecven',
		'fecgen'
	];

	protected $fillable = [
		'numfol',
		'numcue',
		'nomcad',
		'nithot',
		'hotel',
		'resfac',
		'fecres',
		'numini',
		'numfin',
		'notreg',
		'notica',
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
		'tocagr8',
		'tocagr16',
		'tocagr10',
		'totiva16',
		'totiva10',
		'totiva',
		'totimp',
		'totabo',
		'total',
		'saldo',
		'basret',
		'propina',
		'nota',
		'formas',
		'fecven',
		'fecgen',
		'tipres',
		'facalo',
		'quien',
		'genusu',
		'canfac',
		'codusu',
		'svf',
		'estado',
		'totalsubsidio'
	];
}
