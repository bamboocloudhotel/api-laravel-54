<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sereve
 * 
 * @property int $codser
 * @property string $nombre
 * @property string $estado
 *
 * @package App\Models
 */
class Sereve extends Model
{
	protected $table = 'sereve';
	protected $primaryKey = 'codser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codser' => 'int'
	];

	protected $fillable = [
		'nombre',
		'estado'
	];
}
