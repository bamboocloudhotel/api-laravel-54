<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Concot
 * 
 * @property int $id
 * @property string $encabezado
 * @property string $politicas
 * @property string $firma
 *
 * @package App\Models
 */
class Concot extends Model
{
	protected $table = 'concot';
	public $timestamps = false;

	protected $fillable = [
		'encabezado',
		'politicas',
		'firma'
	];
}
