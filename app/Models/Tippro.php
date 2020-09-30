<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tippro
 * 
 * @property int $tippro
 * @property string $detalle
 * @property string $genest
 *
 * @package App\Models
 */
class Tippro extends Model
{
	protected $table = 'tippro';
	protected $primaryKey = 'tippro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tippro' => 'int'
	];

	protected $fillable = [
		'detalle',
		'genest'
	];
}
