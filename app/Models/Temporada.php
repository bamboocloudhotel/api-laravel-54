<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Temporada
 * 
 * @property int $codigo
 * @property string $tipo
 * @property string $mesini
 * @property string $mesfin
 *
 * @package App\Models
 */
class Temporada extends Model
{
	protected $table = 'temporada';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int'
	];

	protected $fillable = [
		'tipo',
		'mesini',
		'mesfin'
	];
}
