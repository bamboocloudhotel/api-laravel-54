<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preopei
 * 
 * @property string $codigo
 * @property string $nombre
 *
 * @package App\Models
 */
class Preopei extends Model
{
	protected $table = 'preopei';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
