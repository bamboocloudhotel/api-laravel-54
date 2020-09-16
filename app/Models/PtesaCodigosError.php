<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaCodigosError
 * 
 * @property int $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaCodigosError extends Model
{
	protected $table = 'ptesa_codigos_error';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
