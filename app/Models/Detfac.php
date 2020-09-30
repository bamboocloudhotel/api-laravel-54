<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detfac
 * 
 * @property int $id
 * @property string $prefac
 * @property int $numfac
 * @property int $item
 * @property int $codcar
 * @property string $fecha
 * @property string $concepto
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $servicio
 * @property float $terceros
 * @property float $total
 * @property float $abonos
 * @property float $saldo
 * @property float $subsidio
 *
 * @package App\Models
 */
class Detfac extends Model
{
	protected $table = 'detfac';
	public $timestamps = false;

	protected $casts = [
		'numfac' => 'int',
		'item' => 'int',
		'codcar' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'impo' => 'float',
		'servicio' => 'float',
		'terceros' => 'float',
		'total' => 'float',
		'abonos' => 'float',
		'saldo' => 'float',
		'subsidio' => 'float'
	];

	protected $fillable = [
		'prefac',
		'numfac',
		'item',
		'codcar',
		'fecha',
		'concepto',
		'valor',
		'iva',
		'impo',
		'servicio',
		'terceros',
		'total',
		'abonos',
		'saldo',
		'subsidio'
	];
}
