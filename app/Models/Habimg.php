<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habimg
 * 
 * @property string $piso
 * @property string $detalle
 * @property string $img
 *
 * @package App\Models
 */
class Habimg extends Model
{
	protected $table = 'habimg';
	protected $primaryKey = 'piso';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'detalle',
		'img'
	];
}
