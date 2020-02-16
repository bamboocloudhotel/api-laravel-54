<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipcue
 * 
 * @property int $numcue
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipcue extends Model
{
	protected $table = 'tipcue';
	protected $primaryKey = 'numcue';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numcue' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
