<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Novman
 * 
 * @property int $id
 * @property int $novrep_id
 * @property int $codusu
 *
 * @package App\Models
 */
class Novman extends Model
{
	protected $table = 'novmen';
	public $timestamps = false;

	protected $casts = [
		'novrep_id' => 'int',
		'codusu' => 'int'
	];

	protected $fillable = [
		'novrep_id',
		'codusu'
	];
}
