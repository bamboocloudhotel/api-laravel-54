<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Confcir
 * 
 * @property int $id
 * @property string $notext
 *
 * @package App\Models
 */
class Confcir extends Model
{
	protected $table = 'confcir';
	public $timestamps = false;

	protected $fillable = [
		'notext'
	];
}
