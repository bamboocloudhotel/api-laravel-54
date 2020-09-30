<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SmtpCuenta
 * 
 * @property int $id_smtp_cuenta
 * @property string $server_smtp
 * @property string $encry_smtp
 * @property int $port_smtp
 * @property string $username_smtp
 * @property string $password_smtp
 * @property string $from_name_smtp
 * @property string $usuario_creacion
 * @property string $usuario_modificacion
 * @property Carbon $fecha_creacion
 * @property Carbon $fecha_modificacion
 *
 * @package App\Models
 */
class SmtpCuenta extends Model
{
	protected $table = 'smtp_cuentas';
	protected $primaryKey = 'id_smtp_cuenta';
	public $timestamps = false;

	protected $casts = [
		'port_smtp' => 'int'
	];

	protected $dates = [
		'fecha_creacion',
		'fecha_modificacion'
	];

	protected $fillable = [
		'server_smtp',
		'encry_smtp',
		'port_smtp',
		'username_smtp',
		'password_smtp',
		'from_name_smtp',
		'usuario_creacion',
		'usuario_modificacion',
		'fecha_creacion',
		'fecha_modificacion'
	];
}
