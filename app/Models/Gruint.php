<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gruint
 * 
 * @property int $gruint
 * @property string $nombre
 * @property string $descripcion
 *
 * @package App\Models
 */
class Gruint extends Model
{
	protected $table = 'gruint';
	protected $primaryKey = 'gruint';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'gruint' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion'
	];
}
