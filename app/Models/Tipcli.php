<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipcli
 * 
 * @property int $tipcli
 * @property string $detalle
 * @property string $predeterminado
 *
 * @package App\Models
 */
class Tipcli extends Model
{
	protected $table = 'tipcli';
	protected $primaryKey = 'tipcli';
	public $timestamps = false;

	protected $fillable = [
		'detalle',
		'predeterminado'
	];
}
