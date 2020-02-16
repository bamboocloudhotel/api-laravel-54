<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CiudadesDian
 * 
 * @property int $id
 * @property string $codCiudad
 * @property string $codDepto
 * @property string $codPais
 * @property string $nombre_ciudad
 * @property string $nombre_depto
 * @property string $nombre_pais
 * @property string $abreviatura_pais
 *
 * @package App\Models
 */
class CiudadesDian extends Model
{
	protected $table = 'ciudades_dian';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'codCiudad',
		'codDepto',
		'codPais',
		'nombre_ciudad',
		'nombre_depto',
		'nombre_pais',
		'abreviatura_pais'
	];
}
