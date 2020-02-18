<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plaapl
 * 
 * @property int $id
 * @property int $numfol
 * @property Carbon $fecha
 * @property int $codpla
 *
 * @package App\Models
 */
class Plaapl extends Model
{
	protected $table = 'plaapl';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'codpla' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'numfol',
		'fecha',
		'codpla'
	];
}
