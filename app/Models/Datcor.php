<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datcor
 * 
 * @property int $id
 * @property string $servidor
 * @property string $usuario
 * @property string $clave
 *
 * @package App\Models
 */
class Datcor extends Model
{
	protected $table = 'datcor';
	public $timestamps = false;

	protected $fillable = [
		'servidor',
		'usuario',
		'clave'
	];
}
