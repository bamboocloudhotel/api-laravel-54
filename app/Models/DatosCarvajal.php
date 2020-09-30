<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosCarvajal
 * 
 * @property int $cons
 * @property string $ENC_1
 * @property string $ENC_4
 * @property string $ENC_5
 * @property int $ENC_9
 * @property string $ENC_10
 * @property int $EMI_1
 * @property string $TAC_1
 * @property string $TIM_1
 * @property string $CTS_1
 * @property string $estado
 *
 * @package App\Models
 */
class DatosCarvajal extends Model
{
	protected $table = 'datos_carvajal';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'ENC_9' => 'int',
		'EMI_1' => 'int'
	];

	protected $fillable = [
		'ENC_1',
		'ENC_4',
		'ENC_5',
		'ENC_9',
		'ENC_10',
		'EMI_1',
		'TAC_1',
		'TIM_1',
		'CTS_1',
		'estado'
	];
}
