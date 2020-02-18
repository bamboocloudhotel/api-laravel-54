<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Novcom
 * 
 * @property int $id
 * @property int $novrep_id
 * @property int $codusu
 * @property int $fecha
 * @property string $texto
 *
 * @package App\Models
 */
class Novcom extends Model
{
	protected $table = 'novcom';
	public $timestamps = false;

	protected $casts = [
		'novrep_id' => 'int',
		'codusu' => 'int',
		'fecha' => 'int'
	];

	protected $fillable = [
		'novrep_id',
		'codusu',
		'fecha',
		'texto'
	];
}
