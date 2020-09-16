<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preman
 * 
 * @property string $ano
 * @property string $mes
 * @property int $codgru
 * @property float $valor
 *
 * @package App\Models
 */
class Preman extends Model
{
	protected $table = 'premen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codgru' => 'int',
		'valor' => 'float'
	];

	protected $fillable = [
		'valor'
	];
}
