<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empcon
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nit
 * @property string $tipo
 * @property string $nombre
 * @property string $cargo
 * @property string $celular
 * @property string $telefono
 * @property string $email
 * @property string $estado
 *
 * @package App\Models
 */
class Empcon extends Model
{
	protected $table = 'empcon';
	public $timestamps = false;

	protected $fillable = [
		'uuid',
		'nit',
		'tipo',
		'nombre',
		'cargo',
		'celular',
		'telefono',
		'email',
		'estado'
	];
}
