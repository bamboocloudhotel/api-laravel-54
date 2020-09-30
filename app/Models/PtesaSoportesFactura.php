<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaSoportesFactura
 * 
 * @property int $id
 * @property int $creacion
 * @property string $cufe
 * @property boolean $request
 * @property string $mensajeRespuesta
 * @property string $filename
 * @property boolean $filecontent
 *
 * @package App\Models
 */
class PtesaSoportesFactura extends Model
{
	protected $table = 'ptesa_soportes_facturas';
	public $timestamps = false;

	protected $casts = [
		'creacion' => 'int',
		'request' => 'boolean',
		'filecontent' => 'boolean'
	];

	protected $fillable = [
		'creacion',
		'cufe',
		'request',
		'mensajeRespuesta',
		'filename',
		'filecontent'
	];
}
