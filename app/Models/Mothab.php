<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mothab
 * 
 * @property int $mothab
 * @property string $detalle
 *
 * @package App\Models
 */
class Mothab extends Model
{
	protected $table = 'mothab';
	protected $primaryKey = 'mothab';
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
