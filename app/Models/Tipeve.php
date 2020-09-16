<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipeve
 * 
 * @property int $tipeve
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipeve extends Model
{
	protected $table = 'tipeve';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipeve' => 'int'
	];

	protected $fillable = [
		'tipeve',
		'detalle'
	];
}
