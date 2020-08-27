<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiphab
 * 
 * @property int $tiphab
 * @property string $detalle
 *
 * @package App\Models
 */
class Tiphab extends Model
{
	protected $table = 'tiphab';
	protected $primaryKey = 'tiphab';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tiphab' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
