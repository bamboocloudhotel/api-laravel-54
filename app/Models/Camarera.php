<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Camarera
 * 
 * @property int $codcam
 * @property string $nombre
 * @property int $cantidad
 * @property int $numhab
 * @property int $codusu
 * @property string $estado
 *
 * @package App\Models
 */
class Camarera extends Model
{
	protected $table = 'camarera';
	protected $primaryKey = 'codcam';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcam' => 'int',
		'cantidad' => 'int',
		'numhab' => 'int',
		'codusu' => 'int'
	];

	protected $fillable = [
		'nombre',
		'cantidad',
		'numhab',
		'codusu',
		'estado'
	];
}
