<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SevenOperacione
 * 
 * @property int $id
 * @property string $codigo_operacion
 * @property string $operacion
 * @property string $descripcion_operacion
 * @property string $codigo_opera_seven
 *
 * @package App\Models
 */
class SevenOperacione extends Model
{
	protected $table = 'seven_operaciones';
	public $timestamps = false;

	protected $fillable = [
		'codigo_operacion',
		'operacion',
		'descripcion_operacion',
		'codigo_opera_seven'
	];
}
