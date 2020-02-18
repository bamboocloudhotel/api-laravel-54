<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Regcam
 * 
 * @property int $codreg
 * @property Carbon $fecha
 * @property int $codusu
 * @property int $numfol
 * @property string $habini
 * @property string $habfin
 * @property string $mothab
 * @property string $nota
 *
 * @package App\Models
 */
class Regcam extends Model
{
	protected $table = 'regcam';
	protected $primaryKey = 'codreg';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'numfol' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'codusu',
		'numfol',
		'habini',
		'habfin',
		'mothab',
		'nota'
	];
}
