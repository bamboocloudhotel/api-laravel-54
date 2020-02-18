<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parambhstr
 * 
 * @property string $codparam
 * @property string $id_hotel
 * @property string $send_email
 * @property string $email_destino
 * @property string $send_ftp
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
class Parambhstr extends Model
{
	protected $table = 'parambhstr';
	protected $primaryKey = 'codparam';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'id_hotel',
		'send_email',
		'email_destino',
		'send_ftp',
		'server_ftp',
		'user_ftp',
		'password_ftp',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
