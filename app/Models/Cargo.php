<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 * 
 * @property int $codcar
 * @property string $descripcion
 * @property string $tipmov
 * @property string $coddep
 * @property int $codgru
 * @property int $gruest
 * @property string $cueven
 * @property string $interf
 * @property string $movven
 * @property string $codcen
 * @property string $incbas
 * @property string $ivainc
 * @property float $poriva
 * @property string $cueiva
 * @property string $ceniva
 * @property float $porimp
 * @property string $cueimp
 * @property string $cenimp
 * @property float $porser
 * @property string $cueser
 * @property string $censer
 * @property string $ingter
 * @property float $porcos
 * @property string $cueter
 * @property string $center
 * @property string $cree
 * @property string $afehue
 * @property string $muecaj
 * @property string $descaj
 * @property string $comcon
 * @property string $ajuiva
 * @property string $ajuimp
 * @property string $ajuser
 * @property string $estado
 * @property string $subsidio
 *
 * @package App\Models
 */
class Cargo extends Model
{
	protected $table = 'cargos';
	protected $primaryKey = 'codcar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int',
		'codgru' => 'int',
		'gruest' => 'int',
		'poriva' => 'float',
		'porimp' => 'float',
		'porser' => 'float',
		'porcos' => 'float'
	];

	protected $fillable = [
		'descripcion',
		'tipmov',
		'coddep',
		'codgru',
		'gruest',
		'cueven',
		'interf',
		'movven',
		'codcen',
		'incbas',
		'ivainc',
		'poriva',
		'cueiva',
		'ceniva',
		'porimp',
		'cueimp',
		'cenimp',
		'porser',
		'cueser',
		'censer',
		'ingter',
		'porcos',
		'cueter',
		'center',
		'cree',
		'afehue',
		'muecaj',
		'descaj',
		'comcon',
		'ajuiva',
		'ajuimp',
		'ajuser',
		'estado',
		'subsidio'
	];
}
