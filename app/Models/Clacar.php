<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clacar
 * 
 * @property int $codcar
 * @property string $detalle
 *
 * @package App\Models
 */
class Clacar extends Model
{
	protected $table = 'clacar';
	protected $primaryKey = 'codcar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
