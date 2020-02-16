<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modulo
 * 
 * @property string $codmod
 * @property string $nombre
 * @property int $codper
 *
 * @package App\Models
 */
class Modulo extends Model
{
	protected $table = 'modulos';
	protected $primaryKey = 'codmod';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codper' => 'int'
	];

	protected $fillable = [
		'nombre',
		'codper'
	];
}
