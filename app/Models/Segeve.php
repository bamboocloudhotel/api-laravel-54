<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Segeve
 * 
 * @property int $codseg
 * @property string $detalle
 *
 * @package App\Models
 */
class Segeve extends Model
{
	protected $table = 'segeve';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codseg' => 'int'
	];

	protected $fillable = [
		'codseg',
		'detalle'
	];
}
