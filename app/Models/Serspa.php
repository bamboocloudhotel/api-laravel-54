<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Serspa
 * 
 * @property int $codser
 * @property string $nombre
 * @property string $duracion
 * @property string $estado
 *
 * @package App\Models
 */
class Serspa extends Model
{
	protected $table = 'serspa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codser' => 'int'
	];

	protected $fillable = [
		'codser',
		'nombre',
		'duracion',
		'estado'
	];
}
