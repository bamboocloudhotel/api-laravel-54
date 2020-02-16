<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudade
 * 
 * @property int $codciu
 * @property int $codpai
 * @property string $nombre
 * @property int $coddane
 * @property int $location_id
 *
 * @package App\Models
 */
class Ciudade extends Model
{
	protected $table = 'ciudades';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codciu' => 'int',
		'codpai' => 'int',
		'coddane' => 'int',
		'location_id' => 'int'
	];

	protected $fillable = [
		'nombre',
		'coddane',
		'location_id'
	];
}
