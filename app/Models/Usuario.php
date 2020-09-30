<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $codusu
 * @property int $codsuc
 * @property string $nombre
 * @property string $login
 * @property string $pass
 * @property string $password
 * @property string $foto
 * @property string $email
 * @property string $telefono
 * @property string $genero
 * @property int $codprf
 * @property int $ultlog
 * @property string $ipaddress
 * @property string $status
 * @property int $writing
 * @property Carbon $camcla
 * @property string $estado
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'codusu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'codsuc' => 'int',
		'codprf' => 'int',
		'ultlog' => 'int',
		'writing' => 'int'
	];

	protected $dates = [
		'camcla'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'codsuc',
		'nombre',
		'login',
		'pass',
		'password',
		'foto',
		'email',
		'telefono',
		'genero',
		'codprf',
		'ultlog',
		'ipaddress',
		'status',
		'writing',
		'camcla',
		'estado'
	];
}
