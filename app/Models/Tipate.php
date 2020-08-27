<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipate
 * 
 * @property int $codigo
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipate extends Model
{
	protected $table = 'tipate';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
