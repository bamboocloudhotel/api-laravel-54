<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Depart
 * 
 * @property string $coddep
 * @property string $nombre
 *
 * @package App\Models
 */
class Depart extends Model
{
	protected $table = 'depart';
	protected $primaryKey = 'coddep';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
