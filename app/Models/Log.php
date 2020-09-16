<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $id
 * @property string $data
 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'logs';
	public $timestamps = false;

	protected $fillable = [
		'data'
	];
}
