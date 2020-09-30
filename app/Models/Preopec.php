<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preopec
 * 
 * @property string $codigo
 * @property string $nombre
 *
 * @package App\Models
 */
class Preopec extends Model
{
	protected $table = 'preopec';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
