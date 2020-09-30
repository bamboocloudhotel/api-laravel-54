<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrem
 * 
 * @property int $id
 * @property string $texto
 *
 * @package App\Models
 */
class Carrem extends Model
{
	protected $table = 'carrem';
	public $timestamps = false;

	protected $fillable = [
		'texto'
	];
}
