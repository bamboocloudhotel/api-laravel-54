<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipgar
 * 
 * @property int $tipgar
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipgar extends Model
{
	protected $table = 'tipgar';
	protected $primaryKey = 'tipgar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipgar' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
