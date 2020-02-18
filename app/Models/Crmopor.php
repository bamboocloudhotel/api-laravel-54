<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmopor
 * 
 * @property int $codopo
 * @property int $codcam
 * @property string $nit
 * @property string $nombre
 * @property float $monto
 * @property string $origen
 * @property string $descripcion
 * @property string $tipo
 * @property Carbon $feccie
 * @property int $probabilidad
 * @property string $estado
 * @property int $codven
 *
 * @package App\Models
 */
class Crmopor extends Model
{
	protected $table = 'crmopor';
	protected $primaryKey = 'codopo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codopo' => 'int',
		'codcam' => 'int',
		'monto' => 'float',
		'probabilidad' => 'int',
		'codven' => 'int'
	];

	protected $dates = [
		'feccie'
	];

	protected $fillable = [
		'codcam',
		'nit',
		'nombre',
		'monto',
		'origen',
		'descripcion',
		'tipo',
		'feccie',
		'probabilidad',
		'estado',
		'codven'
	];
}
