<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesion
 * 
 * @property int $codpro
 * @property string $nombre
 * @property string $predeterminado
 *
 * @package App\Models
 */
class Profesion extends Model
{
	protected $table = 'profesion';
	protected $primaryKey = 'codpro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpro' => 'int'
	];

	protected $fillable = [
		'nombre',
		'predeterminado'
	];
}
