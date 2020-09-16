<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pwsfactura
 * 
 * @property int $cons
 * @property string $emp_codi
 * @property string $top_codi
 * @property string $abr_codc
 * @property string $abr_coda
 * @property string $abr_coss
 *
 * @package App\Models
 */
class Pwsfactura extends Model
{
	protected $table = 'pwsfactura';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $fillable = [
		'emp_codi',
		'top_codi',
		'abr_codc',
		'abr_coda',
		'abr_coss'
	];
}
