<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moteve
 * 
 * @property int $moteve
 * @property string $detalle
 *
 * @package App\Models
 */
class Moteve extends Model
{
	protected $table = 'moteve';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'moteve' => 'int'
	];

	protected $fillable = [
		'moteve',
		'detalle'
	];
}
