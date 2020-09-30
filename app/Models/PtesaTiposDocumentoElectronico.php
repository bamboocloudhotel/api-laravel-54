<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTiposDocumentoElectronico
 * 
 * @property int $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaTiposDocumentoElectronico extends Model
{
	protected $table = 'ptesa_tipos_documento_electronico';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
