<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientesHotel
 * 
 * @property int $cons
 * @property string $cedula
 * @property Carbon $fecha_graba
 * @property string $usuario_ip
 * @property int $numfol
 *
 * @package App\Models
 */
class ClientesHotel extends Model
{
	protected $table = 'clientes_hotel';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'numfol' => 'int'
	];

	protected $dates = [
		'fecha_graba'
	];

	protected $fillable = [
		'cedula',
		'fecha_graba',
		'usuario_ip',
		'numfol'
	];
}
