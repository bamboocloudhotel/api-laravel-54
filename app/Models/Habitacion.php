<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habitacion
 * 
 * @property string $numhab
 * @property int $codcla
 * @property string $area
 * @property int $piso
 * @property int $numcam
 * @property string $fumador
 * @property string $observacion
 * @property string $tipo
 * @property string $extension
 * @property string $signature
 * @property int $codest
 * @property string $estado
 *
 * @package App\Models
 */
class Habitacion extends Model
{
	protected $table = 'habitacion';
	protected $primaryKey = 'numhab';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcla' => 'int',
		'piso' => 'int',
		'numcam' => 'int',
		'codest' => 'int'
	];

	protected $fillable = [
		'codcla',
		'area',
		'piso',
		'numcam',
		'fumador',
		'observacion',
		'tipo',
		'extension',
		'signature',
		'codest',
		'estado'
	];
}
