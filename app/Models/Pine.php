<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pine
 * 
 * @property int $id
 * @property string $codigo
 * @property string $estado
 *
 * @package App\Models
 */
class Pine extends Model
{
	protected $table = 'pines';
	public $timestamps = false;

	protected $fillable = [
		'codigo',
		'estado'
	];
}
