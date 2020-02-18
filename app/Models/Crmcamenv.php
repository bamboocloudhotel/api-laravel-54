<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmcamenv
 * 
 * @property int $id
 * @property int $codcam
 * @property int $codusu
 * @property Carbon $fecha
 * @property string $campaign_key
 * @property string $email
 * @property string $mailuid
 * @property string $diainf
 * @property Carbon $fecent
 * @property string $estado
 *
 * @package App\Models
 */
class Crmcamenv extends Model
{
	protected $table = 'crmcamenv';
	public $timestamps = false;

	protected $casts = [
		'codcam' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecent'
	];

	protected $fillable = [
		'codcam',
		'codusu',
		'fecha',
		'campaign_key',
		'email',
		'mailuid',
		'diainf',
		'fecent',
		'estado'
	];
}
