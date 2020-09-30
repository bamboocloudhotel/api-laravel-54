<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conre
 * 
 * @property int $numres
 * @property int $codcla
 * @property int $cantidad
 * @property int $codpla
 *
 * @package App\Models
 */
class Conre extends Model
{
	protected $table = 'conres';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numres' => 'int',
		'codcla' => 'int',
		'cantidad' => 'int',
		'codpla' => 'int'
	];

	protected $fillable = [
		'cantidad',
		'codpla'
	];
}
