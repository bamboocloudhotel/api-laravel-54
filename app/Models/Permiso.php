<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property string $codper
 * @property string $nombre
 * @property string $tipo
 * @property int $codgru
 * @property int $menu
 * @property int $opcion
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'codper';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codgru' => 'int',
		'menu' => 'int',
		'opcion' => 'int'
	];

	protected $fillable = [
		'nombre',
		'tipo',
		'codgru',
		'menu',
		'opcion'
	];
}
