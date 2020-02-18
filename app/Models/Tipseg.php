<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipseg
 * 
 * @property string $tipseg
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipseg extends Model
{
	protected $table = 'tipseg';
	protected $primaryKey = 'tipseg';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
