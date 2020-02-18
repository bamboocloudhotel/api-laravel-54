<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ayuda
 * 
 * @property int $id
 * @property string $aaction
 * @property string $titulo
 * @property string $texto
 *
 * @package App\Models
 */
class Ayuda extends Model
{
	protected $table = 'ayuda';
	public $timestamps = false;

	protected $fillable = [
		'aaction',
		'titulo',
		'texto'
	];
}
