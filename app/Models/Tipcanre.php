<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipcanre
 * 
 * @property int $codcan
 * @property string $detalle
 *
 * @package App\Models
 */
class Tipcanre extends Model
{
	protected $table = 'tipcanres';
	protected $primaryKey = 'codcan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcan' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
