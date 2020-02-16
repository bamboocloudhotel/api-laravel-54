<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $uri
 * @property int $position
 *
 * @package App\Models
 */
class Photo extends Model
{
	protected $table = 'photos';
	public $timestamps = false;

	protected $casts = [
		'position' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'uri',
		'position'
	];
}
