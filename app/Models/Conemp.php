<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conemp
 * 
 * @property string $nit
 * @property string $observacion
 *
 * @package App\Models
 */
class Conemp extends Model
{
	protected $table = 'conemp';
	protected $primaryKey = 'nit';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'observacion'
	];
}
