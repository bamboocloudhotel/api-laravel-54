<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTiposIdentificacion
 * 
 * @property int $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaTiposIdentificacion extends Model
{
	protected $table = 'ptesa_tipos_identificacion';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
