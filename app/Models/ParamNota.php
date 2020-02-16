<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamNota
 * 
 * @property int $con
 * @property string $prenot
 * @property int $nota
 *
 * @package App\Models
 */
class ParamNota extends Model
{
	protected $table = 'param_notas';
	protected $primaryKey = 'con';
	public $timestamps = false;

	protected $casts = [
		'nota' => 'int'
	];

	protected $fillable = [
		'prenot',
		'nota'
	];
}
