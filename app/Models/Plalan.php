<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plalan
 * 
 * @property int $codigo
 * @property int $codint
 * @property string $lang
 * @property string $nombre
 * @property string $descripcion
 * @property string $garantia
 * @property string $cancelacion
 *
 * @package App\Models
 */
class Plalan extends Model
{
	protected $table = 'plalan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'codint' => 'int'
	];

	protected $fillable = [
		'codigo',
		'codint',
		'lang',
		'nombre',
		'descripcion',
		'garantia',
		'cancelacion'
	];
}
