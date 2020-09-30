<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaMotivosRechazo
 * 
 * @property int $id
 * @property string $nombre
 *
 * @package App\Models
 */
class PtesaMotivosRechazo extends Model
{
	protected $table = 'ptesa_motivos_rechazo';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
