<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipobj
 * 
 * @property int $codigo
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipobj extends Model
{
	protected $table = 'tipobj';
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
