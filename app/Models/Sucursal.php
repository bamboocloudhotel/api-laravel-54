<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sucursal
 * 
 * @property int $codsuc
 * @property string $nit
 * @property string $nombre
 *
 * @package App\Models
 */
class Sucursal extends Model
{
	protected $table = 'sucursal';
	protected $primaryKey = 'codsuc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codsuc' => 'int'
	];

	protected $fillable = [
		'nit',
		'nombre'
	];
}
