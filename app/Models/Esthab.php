<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Esthab
 * 
 * @property int $codest
 * @property string $detalle
 * @property string $color
 *
 * @package App\Models
 */
class Esthab extends Model
{
	protected $table = 'esthab';
	protected $primaryKey = 'codest';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codest' => 'int'
	];

	protected $fillable = [
		'detalle',
		'color'
	];
}
