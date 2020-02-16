<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dirhot
 * 
 * @property int $id
 * @property string $tipo
 * @property string $nombre
 * @property string $cargo
 * @property string $ciudad
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 *
 * @package App\Models
 */
class Dirhot extends Model
{
	protected $table = 'dirhot';
	public $timestamps = false;

	protected $fillable = [
		'tipo',
		'nombre',
		'cargo',
		'ciudad',
		'telefono1',
		'telefono2',
		'email'
	];
}
