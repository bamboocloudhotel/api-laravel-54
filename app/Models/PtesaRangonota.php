<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaRangonota
 * 
 * @property int $id
 * @property int $numeroacionFinalC
 * @property int $numeracionInicialC
 * @property string $prefijoC
 * @property int $numeroacionFinalD
 * @property int $numeracionInicialD
 * @property string $prefijoD
 *
 * @package App\Models
 */
class PtesaRangonota extends Model
{
	protected $table = 'ptesa_rangonotas';
	public $timestamps = false;

	protected $casts = [
		'numeroacionFinalC' => 'int',
		'numeracionInicialC' => 'int',
		'numeroacionFinalD' => 'int',
		'numeracionInicialD' => 'int'
	];

	protected $fillable = [
		'numeroacionFinalC',
		'numeracionInicialC',
		'prefijoC',
		'numeroacionFinalD',
		'numeracionInicialD',
		'prefijoD'
	];
}
