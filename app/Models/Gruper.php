<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gruper
 * 
 * @property int $codgru
 * @property string $nombre
 *
 * @package App\Models
 */
class Gruper extends Model
{
	protected $table = 'gruper';
	protected $primaryKey = 'codgru';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codgru' => 'int'
	];

	protected $fillable = [
		'nombre'
	];
}
