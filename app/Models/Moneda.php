<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moneda
 * 
 * @property int $moneda
 * @property string $nombre
 * @property string $simbolo
 * @property string $tipo
 * @property string $usecen
 *
 * @package App\Models
 */
class Moneda extends Model
{
	protected $table = 'moneda';
	protected $primaryKey = 'moneda';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'moneda' => 'int'
	];

	protected $fillable = [
		'nombre',
		'simbolo',
		'tipo',
		'usecen'
	];
}
