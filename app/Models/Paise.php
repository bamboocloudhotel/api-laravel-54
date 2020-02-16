<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paise
 * 
 * @property int $codpai
 * @property string $nombre
 *
 * @package App\Models
 */
class Paise extends Model
{
	protected $table = 'paises';
	protected $primaryKey = 'codpai';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpai' => 'int'
	];

	protected $fillable = [
		'nombre'
	];
}
