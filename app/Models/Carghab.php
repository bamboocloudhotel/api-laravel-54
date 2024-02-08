<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carghab
 * 
 * @property int $numfol
 * @property int $numcue
 * @property string $prefac
 * @property int $numfac
 * @property string $tipfac
 * @property string $numdoc
 * @property string $exento
 * @property string $estado
 *
 * @package App\Models
 */
class Carghab extends Model
{
    protected $connection = 'on_the_fly';
	protected $table = 'carghab';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numcue' => 'int',
		'numfac' => 'int'
	];

	protected $fillable = [
        'numfol',
        'numcue',
		'prefac',
		'numfac',
		'tipfac',
		'numdoc',
		'exento',
		'estado'
	];
}
