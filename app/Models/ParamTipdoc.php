<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamTipdoc
 * 
 * @property int $tipdoc
 * @property int $tipcodi
 *
 * @package App\Models
 */
class ParamTipdoc extends Model
{
	protected $table = 'param_tipdoc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipdoc' => 'int',
		'tipcodi' => 'int'
	];

	protected $fillable = [
		'tipdoc',
		'tipcodi'
	];
}
