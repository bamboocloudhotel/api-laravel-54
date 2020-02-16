<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estblo
 * 
 * @property int $estblo
 * @property string $detalle
 *
 * @package App\Models
 */
class Estblo extends Model
{
	protected $table = 'estblo';
	protected $primaryKey = 'estblo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'estblo' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
