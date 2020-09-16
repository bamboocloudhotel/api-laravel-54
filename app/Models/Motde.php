<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Motde
 * 
 * @property int $motdes
 * @property string $detalle
 *
 * @package App\Models
 */
class Motde extends Model
{
	protected $table = 'motdes';
	protected $primaryKey = 'motdes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'motdes' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
