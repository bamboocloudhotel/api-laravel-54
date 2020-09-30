<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transporte
 * 
 * @property int $codtra
 * @property string $nombre
 * @property string $predeterminado
 *
 * @package App\Models
 */
class Transporte extends Model
{
	protected $table = 'transporte';
	protected $primaryKey = 'codtra';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codtra' => 'int'
	];

	protected $fillable = [
		'nombre',
		'predeterminado'
	];
}
