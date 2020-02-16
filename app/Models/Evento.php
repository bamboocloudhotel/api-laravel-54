<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 * 
 * @property int $codeve
 * @property string $referencia
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nit
 * @property int $tipeve
 * @property int $codsal
 * @property int $codseg
 * @property Carbon $fecreg
 * @property Carbon $fecha
 * @property string $horini
 * @property string $horfin
 * @property Carbon $feclim
 * @property int $codusu
 * @property int $numper
 * @property string $responsable
 * @property string $forpag
 * @property string $nota
 * @property string $carta
 * @property string $estado
 *
 * @package App\Models
 */
class Evento extends Model
{
	protected $table = 'eventos';
	protected $primaryKey = 'codeve';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codeve' => 'int',
		'tipdoc' => 'int',
		'tipeve' => 'int',
		'codsal' => 'int',
		'codseg' => 'int',
		'codusu' => 'int',
		'numper' => 'int'
	];

	protected $dates = [
		'fecreg',
		'fecha',
		'feclim'
	];

	protected $fillable = [
		'referencia',
		'tipdoc',
		'cedula',
		'nit',
		'tipeve',
		'codsal',
		'codseg',
		'fecreg',
		'fecha',
		'horini',
		'horfin',
		'feclim',
		'codusu',
		'numper',
		'responsable',
		'forpag',
		'nota',
		'carta',
		'estado'
	];
}
