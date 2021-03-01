<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plares
 * 
 * @property int $numres
 * @property int $numpla
 * @property int $codpla
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property int $pordes
 * @property string $tipdes
 * @property float $subsidio
 * @property int $valor
 * @property int $valornoche
 *
 * @package App\Models
 */
class Plares extends Model
{
    protected $connection = 'on_the_fly';
	protected $table = 'plares';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'numpla' => 'int',
		'codpla' => 'int',
		'pordes' => 'int',
		'subsidio' => 'float',
		'valor' => 'int',
		'valornoche' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
	    'numres',
        'numpla',
        'codpla',
		'fecini',
		'fecfin',
		'pordes',
		'tipdes',
		'subsidio',
		'valor',
		'valornoche',
        'codigocr'
	];
}
