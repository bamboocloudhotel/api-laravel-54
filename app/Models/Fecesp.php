<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fecesp
 * 
 * @property int $id
 * @property int $mes
 * @property int $dia
 * @property string $nombre
 * @property string $estado
 * @property int $mesf
 * @property int $diaf
 * @property int $year
 *
 * @package App\Models
 */
class Fecesp extends Model
{
	protected $table = 'fecesp';
	public $timestamps = false;

	protected $casts = [
		'mes' => 'int',
		'dia' => 'int',
		'mesf' => 'int',
		'diaf' => 'int',
		'year' => 'int'
	];

	protected $fillable = [
		'mes',
		'dia',
		'nombre',
		'estado',
		'mesf',
		'diaf',
		'year'
	];
}
