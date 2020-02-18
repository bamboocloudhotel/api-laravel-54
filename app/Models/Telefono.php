<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Telefono
 * 
 * @property int $id
 * @property string $linea
 * @property string $estado
 *
 * @package App\Models
 */
class Telefono extends Model
{
	protected $table = 'telefonos';
	public $timestamps = false;

	protected $fillable = [
		'linea',
		'estado'
	];
}
