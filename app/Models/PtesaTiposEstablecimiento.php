<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTiposEstablecimiento
 * 
 * @property string $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaTiposEstablecimiento extends Model
{
	protected $table = 'ptesa_tipos_establecimiento';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
