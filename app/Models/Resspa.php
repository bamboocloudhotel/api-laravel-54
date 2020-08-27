<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resspa
 * 
 * @property int $id
 * @property string $referencia
 * @property string $cedula
 * @property int $codest
 * @property string $horini
 * @property string $horfin
 * @property string $estado
 *
 * @package App\Models
 */
class Resspa extends Model
{
	protected $table = 'resspa';
	public $timestamps = false;

	protected $casts = [
		'codest' => 'int'
	];

	protected $fillable = [
		'referencia',
		'cedula',
		'codest',
		'horini',
		'horfin',
		'estado'
	];
}
