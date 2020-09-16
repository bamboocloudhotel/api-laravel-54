<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Salafa
 * 
 * @property string $nit
 * @property int $numfac
 * @property Carbon $fecha
 * @property float $valor
 *
 * @package App\Models
 */
class Salafa extends Model
{
	protected $table = 'salafa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfac' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'valor'
	];
}
