<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conrel
 * 
 * @property int $codrel
 * @property int $codcar
 * @property int $condes
 * @property int $conexe
 *
 * @package App\Models
 */
class Conrel extends Model
{
	protected $table = 'conrel';
	protected $primaryKey = 'codrel';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codrel' => 'int',
		'codcar' => 'int',
		'condes' => 'int',
		'conexe' => 'int'
	];

	protected $fillable = [
		'codcar',
		'condes',
		'conexe'
	];
}
