<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cxcseven
 * 
 * @property int $cons
 * @property int $cxcseven
 * @property string $prefac
 * @property int $numfac
 * @property float $saldo
 * @property Carbon $fecfac
 * @property Carbon $fecvev
 * @property float $abono
 * @property Carbon $fecprocesa
 * @property string $estado
 * @property int $numrecseven
 * @property int $bnumrec
 * @property string $clidoc
 *
 * @package App\Models
 */
class Cxcseven extends Model
{
	protected $table = 'cxcseven';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'cxcseven' => 'int',
		'numfac' => 'int',
		'saldo' => 'float',
		'abono' => 'float',
		'numrecseven' => 'int',
		'bnumrec' => 'int'
	];

	protected $dates = [
		'fecfac',
		'fecvev',
		'fecprocesa'
	];

	protected $fillable = [
		'cxcseven',
		'prefac',
		'numfac',
		'saldo',
		'fecfac',
		'fecvev',
		'abono',
		'fecprocesa',
		'estado',
		'numrecseven',
		'bnumrec',
		'clidoc'
	];
}
