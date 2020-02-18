<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmcamp
 * 
 * @property int $codcam
 * @property string $nombre
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property string $tipo
 * @property float $presupuesto
 * @property float $ganancia
 * @property string $objetivos
 * @property string $descripcion
 * @property float $costo
 * @property float $cosesp
 * @property string $estado
 *
 * @package App\Models
 */
class Crmcamp extends Model
{
	protected $table = 'crmcamp';
	protected $primaryKey = 'codcam';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcam' => 'int',
		'presupuesto' => 'float',
		'ganancia' => 'float',
		'costo' => 'float',
		'cosesp' => 'float'
	];

	protected $dates = [
		'fecini',
		'fecfin'
	];

	protected $fillable = [
		'nombre',
		'fecini',
		'fecfin',
		'tipo',
		'presupuesto',
		'ganancia',
		'objetivos',
		'descripcion',
		'costo',
		'cosesp',
		'estado'
	];
}
