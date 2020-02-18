<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Valcarh
 * 
 * @property int $numfol
 * @property int $numcue
 * @property int $item
 * @property int $codusu
 * @property int $codcaj
 * @property Carbon $fecaud
 * @property Carbon $fecha
 * @property int $cantidad
 * @property int $codcar
 * @property string $cladoc
 * @property string $numdoc
 * @property int $codpla
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $valter
 * @property float $total
 * @property string $estado
 * @property int $oldfol
 * @property string $movcor
 * @property float $subsidio
 *
 * @package App\Models
 */
class Valcarh extends Model
{
	protected $table = 'valcarh';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numcue' => 'int',
		'item' => 'int',
		'codusu' => 'int',
		'codcaj' => 'int',
		'cantidad' => 'int',
		'codcar' => 'int',
		'codpla' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'impo' => 'float',
		'valser' => 'float',
		'valter' => 'float',
		'total' => 'float',
		'oldfol' => 'int',
		'subsidio' => 'float'
	];

	protected $dates = [
		'fecaud',
		'fecha'
	];

	protected $fillable = [
		'codusu',
		'codcaj',
		'fecha',
		'cantidad',
		'codcar',
		'cladoc',
		'numdoc',
		'codpla',
		'valor',
		'iva',
		'impo',
		'valser',
		'valter',
		'total',
		'estado',
		'oldfol',
		'movcor',
		'subsidio'
	];
}
