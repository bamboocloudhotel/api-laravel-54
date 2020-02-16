<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTipoDocumentoConversion
 * 
 * @property int $id
 * @property int $ptesa_tipo_documento
 * @property int $hotel_tipo_documento
 *
 * @package App\Models
 */
class PtesaTipoDocumentoConversion extends Model
{
	protected $table = 'ptesa_tipo_documento_conversion';
	public $timestamps = false;

	protected $casts = [
		'ptesa_tipo_documento' => 'int',
		'hotel_tipo_documento' => 'int'
	];

	protected $fillable = [
		'ptesa_tipo_documento',
		'hotel_tipo_documento'
	];
}
