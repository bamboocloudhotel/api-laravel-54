<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bloest
 * 
 * @property int $codest
 * @property int $numero
 *
 * @package App\Models
 */
class Bloest extends Model
{
	protected $table = 'bloest';
	protected $primaryKey = 'numero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codest' => 'int',
		'numero' => 'int'
	];

	protected $fillable = [
		'codest'
	];
}
