<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preope
 * 
 * @property string $codigo
 * @property string $nombre
 *
 * @package App\Models
 */
class Preope extends Model
{
	protected $table = 'preope';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
