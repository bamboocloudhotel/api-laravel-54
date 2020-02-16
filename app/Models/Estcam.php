<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estcam
 * 
 * @property int $numero
 * @property int $estado
 * @property int $prioridad
 *
 * @package App\Models
 */
class Estcam extends Model
{
	protected $table = 'estcam';
	protected $primaryKey = 'numero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero' => 'int',
		'estado' => 'int',
		'prioridad' => 'int'
	];

	protected $fillable = [
		'estado',
		'prioridad'
	];
}
