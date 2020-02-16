<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asicam
 * 
 * @property int $codcam
 * @property string $numhab
 * @property Carbon $fecha
 * @property string $horini
 * @property string $horfin
 * @property string $observacion
 * @property string $estado
 *
 * @package App\Models
 */
class Asicam extends Model
{
	protected $table = 'asicam';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcam' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'horfin',
		'observacion',
		'estado'
	];
}
