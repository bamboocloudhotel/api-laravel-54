<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parseven
 * 
 * @property int $codcar
 * @property string $pro_codi
 *
 * @package App\Models
 */
class Parseven extends Model
{
	protected $table = 'parseven';
	protected $primaryKey = 'codcar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcar' => 'int'
	];

	protected $fillable = [
		'pro_codi'
	];
}
