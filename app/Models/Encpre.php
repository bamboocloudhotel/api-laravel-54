<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encpre
 * 
 * @property int $encpre
 * @property string $pregunta
 *
 * @package App\Models
 */
class Encpre extends Model
{
	protected $table = 'encpre';
	protected $primaryKey = 'encpre';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'encpre' => 'int'
	];

	protected $fillable = [
		'pregunta'
	];
}
