<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Esteti
 * 
 * @property int $codest
 * @property string $nombre
 * @property string $estado
 *
 * @package App\Models
 */
class Esteti extends Model
{
	protected $table = 'esteti';
	protected $primaryKey = 'codest';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'estado'
	];
}
