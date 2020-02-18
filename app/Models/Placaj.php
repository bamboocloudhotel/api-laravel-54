<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Placaj
 * 
 * @property int $codigo
 * @property int $codpla
 * @property string $temporada
 * @property string $categoria
 *
 * @package App\Models
 */
class Placaj extends Model
{
	protected $table = 'placaj';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'codpla' => 'int'
	];

	protected $fillable = [
		'codpla',
		'temporada',
		'categoria'
	];
}
