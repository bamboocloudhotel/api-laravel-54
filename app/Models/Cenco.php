<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cenco
 * 
 * @property string $codcen
 * @property string $detalle
 *
 * @package App\Models
 */
class Cenco extends Model
{
	protected $table = 'cencos';
	protected $primaryKey = 'codcen';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
