<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plade
 * 
 * @property int $numfol
 * @property int $codpla
 * @property int $codcar
 * @property string $tipo
 * @property float $valor
 *
 * @package App\Models
 */
class Plade extends Model
{
	protected $table = 'plades';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codpla' => 'int',
		'codcar' => 'int',
		'valor' => 'float'
	];

	protected $fillable = [
		'codcar',
		'tipo',
		'valor'
	];
}
