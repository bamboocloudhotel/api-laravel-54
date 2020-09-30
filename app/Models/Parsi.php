<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parsi
 * 
 * @property string $numero
 * @property string $usecen
 * @property string $red
 * @property int $timina
 * @property int $buztam
 * @property string $comven
 * @property string $coming
 * @property string $cueven
 * @property string $cenven
 * @property string $cuecaj
 * @property string $cencaj
 * @property string $cuecre
 * @property string $cencre
 * @property string $tipint
 * @property string $doccue
 * @property string $doccon
 * @property int $numcar
 * @property string $creedeb
 * @property string $creecre
 * @property float $porcree
 * @property string $docdep
 * @property string $docfac
 * @property string $docrec
 * @property string $docegr
 * @property string $doctel
 * @property string $facing
 * @property int $depsin
 * @property int $depapl
 * @property int $depdev
 * @property int $evesin
 * @property int $eveapl
 * @property int $concar
 * @property int $conaju
 * @property int $pagcon
 * @property int $abopre
 * @property int $motcan
 * @property int $motdes
 * @property string $cliext
 * @property string $empext
 * @property string $habres
 * @property string $preres
 * @property string $notcre
 * @property string $ivatar
 * @property string $cardes
 * @property int $usurep
 * @property string $linenc
 * @property string $conreghot
 *
 * @package App\Models
 */
class Parsi extends Model
{
	protected $table = 'parsis';
	protected $primaryKey = 'numero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timina' => 'int',
		'buztam' => 'int',
		'numcar' => 'int',
		'porcree' => 'float',
		'depsin' => 'int',
		'depapl' => 'int',
		'depdev' => 'int',
		'evesin' => 'int',
		'eveapl' => 'int',
		'concar' => 'int',
		'conaju' => 'int',
		'pagcon' => 'int',
		'abopre' => 'int',
		'motcan' => 'int',
		'motdes' => 'int',
		'usurep' => 'int'
	];

	protected $fillable = [
		'usecen',
		'red',
		'timina',
		'buztam',
		'comven',
		'coming',
		'cueven',
		'cenven',
		'cuecaj',
		'cencaj',
		'cuecre',
		'cencre',
		'tipint',
		'doccue',
		'doccon',
		'numcar',
		'creedeb',
		'creecre',
		'porcree',
		'docdep',
		'docfac',
		'docrec',
		'docegr',
		'doctel',
		'facing',
		'depsin',
		'depapl',
		'depdev',
		'evesin',
		'eveapl',
		'concar',
		'conaju',
		'pagcon',
		'abopre',
		'motcan',
		'motdes',
		'cliext',
		'empext',
		'habres',
		'preres',
		'notcre',
		'ivatar',
		'cardes',
		'usurep',
		'linenc',
		'conreghot'
	];
}
