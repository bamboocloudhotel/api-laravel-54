<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Softupd
 * 
 * @property int $id
 * @property string $reference
 * @property int $fecha
 * @property int $usize
 *
 * @package App\Models
 */
class Softupd extends Model
{
	protected $table = 'softupd';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'int',
		'usize' => 'int'
	];

	protected $fillable = [
		'reference',
		'fecha',
		'usize'
	];
}
