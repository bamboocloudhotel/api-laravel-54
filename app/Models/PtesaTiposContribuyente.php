<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaTiposContribuyente
 * 
 * @property int $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaTiposContribuyente extends Model
{
	protected $table = 'ptesa_tipos_contribuyente';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
