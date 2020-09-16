<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipre
 * 
 * @property int $tipres
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipre extends Model
{
	protected $table = 'tipres';
	protected $primaryKey = 'tipres';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipres' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
