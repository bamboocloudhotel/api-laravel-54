<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tippla
 * 
 * @property int $tippla
 * @property string $detalle
 * @property string $genest
 *
 * @package App\Models
 */
class Tippla extends Model
{
	protected $table = 'tippla';
	protected $primaryKey = 'tippla';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tippla' => 'int'
	];

	protected $fillable = [
		'detalle',
		'genest'
	];
}
