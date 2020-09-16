<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracar
 * 
 * @property int $folini
 * @property int $cueini
 * @property int $iteini
 * @property int $folfin
 * @property int $cuefin
 * @property int $itefin
 * @property int $codusu
 * @property Carbon $fecsis
 * @property Carbon $fecha
 * @property string $hora
 * @property int $codcar
 * @property string $cladoc
 * @property string $numdoc
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $valter
 * @property float $total
 *
 * @package App\Models
 */
class Tracar extends Model
{
	protected $table = 'tracar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'folini' => 'int',
		'cueini' => 'int',
		'iteini' => 'int',
		'folfin' => 'int',
		'cuefin' => 'int',
		'itefin' => 'int',
		'codusu' => 'int',
		'codcar' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'impo' => 'float',
		'valser' => 'float',
		'valter' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fecsis',
		'fecha'
	];

	protected $fillable = [
		'folini',
		'cueini',
		'iteini',
		'folfin',
		'cuefin',
		'itefin',
		'codusu',
		'fecsis',
		'fecha',
		'hora',
		'codcar',
		'cladoc',
		'numdoc',
		'valor',
		'iva',
		'impo',
		'valser',
		'valter',
		'total'
	];
}
