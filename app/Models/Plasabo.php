<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plasabo
 * 
 * @property int $id
 * @property int $numres
 * @property int $plasticine_id
 * @property string $token
 * @property float $valor
 * @property Carbon $created_at
 * @property Carbon $modified_in
 * @property string $estado
 *
 * @package App\Models
 */
class Plasabo extends Model
{
	protected $table = 'plasabo';
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'plasticine_id' => 'int',
		'valor' => 'float'
	];

	protected $dates = [
		'modified_in'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'numres',
		'plasticine_id',
		'token',
		'valor',
		'modified_in',
		'estado'
	];
}
