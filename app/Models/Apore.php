<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apore
 * 
 * @property int $numres
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
 *
 * @package App\Models
 */
class Apore extends Model
{
	protected $table = 'apores';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'numero' => 'int',
		'tipdoc' => 'int',
		'codnac' => 'int',
		'locnac' => 'int',
		'codpro' => 'int'
	];

	protected $dates = [
		'fecnac'
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
		'fecnac'
	];
}
