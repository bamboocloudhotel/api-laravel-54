<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Novrep
 * 
 * @property int $id
 * @property int $codusu
 * @property int $fecha
 * @property string $texto
 *
 * @package App\Models
 */
class Novrep extends Model
{
	protected $table = 'novrep';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'fecha' => 'int'
	];

	protected $fillable = [
		'codusu',
		'fecha',
		'texto'
	];
}
