<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acteco
 * 
 * @property int $codact
 * @property string $nombre
 *
 * @package App\Models
 */
class Acteco extends Model
{
	protected $table = 'acteco';
	protected $primaryKey = 'codact';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codact' => 'int'
	];

	protected $fillable = [
		'nombre'
	];
}
