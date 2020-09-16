<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wsparam
 * 
 * @property string $toc_codi_fac
 * @property string $emp_codi
 * @property string $cim_codi
 * @property string $list_codi
 * @property string $tip_doc
 *
 * @package App\Models
 */
class Wsparam extends Model
{
	protected $table = 'wsparam';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'toc_codi_fac',
		'emp_codi',
		'cim_codi',
		'list_codi',
		'tip_doc'
	];
}
