<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encuesta
 * 
 * @property int $id
 * @property string $nombre
 * @property string $url
 * @property string $tipo
 * @property string $asunto
 * @property string $mensaje
 * @property string $estado
 *
 * @package App\Models
 */
class Encuesta extends Model
{
	protected $table = 'encuestas';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'url',
		'tipo',
		'asunto',
		'mensaje',
		'estado'
	];
}
