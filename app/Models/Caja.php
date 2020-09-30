<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caja
 * 
 * @property int $codcaj
 * @property string $nombre
 * @property int $codusu
 * @property string $estado
 *
 * @package App\Models
 */
class Caja extends Model
{
	protected $table = 'cajas';
	protected $primaryKey = 'codcaj';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcaj' => 'int',
		'codusu' => 'int'
	];

	protected $fillable = [
		'nombre',
		'codusu',
		'estado'
	];
}
