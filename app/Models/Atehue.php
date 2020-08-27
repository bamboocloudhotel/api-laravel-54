<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Atehue
 * 
 * @property int $codate
 * @property string $detalle
 *
 * @package App\Models
 */
class Atehue extends Model
{
	protected $table = 'atehue';
	protected $primaryKey = 'codate';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codate' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
