<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carhab
 * 
 * @property string $numhab
 * @property int $numcar
 * @property int $codcar
 * @property string $observacion
 * @property string $viscar
 *
 * @package App\Models
 */
class Carhab extends Model
{
	protected $table = 'carhab';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numcar' => 'int',
		'codcar' => 'int'
	];

	protected $fillable = [
		'codcar',
		'observacion',
		'viscar'
	];
}
