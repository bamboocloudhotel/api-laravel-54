<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perprf
 * 
 * @property string $codper
 * @property int $codprf
 *
 * @package App\Models
 */
class Perprf extends Model
{
	protected $table = 'perprf';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codprf' => 'int'
	];
}
