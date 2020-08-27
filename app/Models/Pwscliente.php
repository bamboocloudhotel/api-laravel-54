<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pwscliente
 * 
 * @property int $cons
 * @property string $emp_codi
 * @property string $mod_codi
 * @property string $lis_codi
 *
 * @package App\Models
 */
class Pwscliente extends Model
{
	protected $table = 'pwsclientes';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $fillable = [
		'emp_codi',
		'mod_codi',
		'lis_codi'
	];
}
