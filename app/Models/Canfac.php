<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Canfac
 * 
 * @property int $canfac
 * @property string $detalle
 *
 * @package App\Models
 */
class Canfac extends Model
{
	protected $table = 'canfac';
	protected $primaryKey = 'canfac';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'canfac' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
