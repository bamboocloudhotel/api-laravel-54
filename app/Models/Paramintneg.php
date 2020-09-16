<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paramintneg
 * 
 * @property string $codparam
 * @property string $id_hotel
 * @property string $sistema
 * @property string $medio_envio
 * @property string $email_destino
 * @property string $server_ftp
 * @property string $user_ftp
 * @property string $password_ftp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 *
 * @package App\Models
 */
class Paramintneg extends Model
{
	protected $table = 'paramintneg';
	protected $primaryKey = 'codparam';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'id_hotel',
		'sistema',
		'medio_envio',
		'email_destino',
		'server_ftp',
		'user_ftp',
		'password_ftp',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
