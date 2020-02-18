<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTiposRegiman
 * 
 * @property int $id
 * @property string $nombre
 * @property string $codigo
 *
 * @package App\Models
 */
class PtesaTiposRegiman extends Model
{
	protected $table = 'ptesa_tipos_regimen';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'codigo'
	];
}
