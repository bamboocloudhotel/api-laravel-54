<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Forpag
 * 
 * @property int $forpag
 * @property string $detalle
 * @property int $moneda
 * @property string $cuecon
 * @property string $tipfor
 * @property string $gencom
 * @property string $nitcom
 * @property float $comtar
 * @property string $cuecom
 * @property string $cencom
 * @property float $retfue
 * @property string $cuerfue
 * @property float $retiva
 * @property string $cueriva
 * @property float $retica
 * @property string $cuerica
 * @property string $muecaj
 * @property string $mueres
 * @property string $predeterminado
 * @property string $estado
 *
 * @package App\Models
 */
class Forpag extends Model
{
	protected $table = 'forpag';
	protected $primaryKey = 'forpag';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'forpag' => 'int',
		'moneda' => 'int',
		'comtar' => 'float',
		'retfue' => 'float',
		'retiva' => 'float',
		'retica' => 'float'
	];

	protected $fillable = [
		'detalle',
		'moneda',
		'cuecon',
		'tipfor',
		'gencom',
		'nitcom',
		'comtar',
		'cuecom',
		'cencom',
		'retfue',
		'cuerfue',
		'retiva',
		'cueriva',
		'retica',
		'cuerica',
		'muecaj',
		'mueres',
		'predeterminado',
		'estado'
	];
}
