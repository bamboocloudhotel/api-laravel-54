<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enccal
 * 
 * @property int $enccal
 * @property string $detalle
 *
 * @package App\Models
 */
class Enccal extends Model
{
	protected $table = 'enccal';
	protected $primaryKey = 'enccal';
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
