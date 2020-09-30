<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estcaj
 * 
 * @property string $estado
 * @property string $detalle
 *
 * @package App\Models
 */
class Estcaj extends Model
{
	protected $table = 'estcaj';
	protected $primaryKey = 'estado';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
