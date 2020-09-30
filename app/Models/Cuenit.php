<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenit
 * 
 * @property string $cuenta
 * @property string $descripcion
 * @property string $nit
 *
 * @package App\Models
 */
class Cuenit extends Model
{
	protected $table = 'cuenit';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'cuenta',
		'descripcion',
		'nit'
	];
}
