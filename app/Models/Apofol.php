<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apofol
 * 
 * @property int $numfol
 * @property int $numero
 * @property int $tipdoc
 * @property string $cedula
 * @property string $nombre
 * @property string $lugexp
 * @property int $codnac
 * @property int $locnac
 * @property int $codpro
 * @property string $sexo
 * @property Carbon $fecnac
 * @property Carbon $feclle
 * @property Carbon $fecsal
 * @property string $estado
 *
 * @package App\Models
 */
class Apofol extends Model
{
	protected $table = 'apofol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int',
		'numero' => 'int',
		'tipdoc' => 'int',
		'codnac' => 'int',
		'locnac' => 'int',
		'codpro' => 'int'
	];

	protected $dates = [
		'fecnac',
		'feclle',
		'fecsal'
	];

	protected $fillable = [
		'tipdoc',
		'cedula',
		'nombre',
		'lugexp',
		'codnac',
		'locnac',
		'codpro',
		'sexo',
		'fecnac',
		'feclle',
		'fecsal',
		'estado'
	];
}
