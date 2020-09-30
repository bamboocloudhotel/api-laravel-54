<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaNotaCredito
 * 
 * @property int $id
 * @property string $prefijo
 * @property int $numero
 * @property string $request
 * @property string $response
 * @property string $codigoRespuesta
 * @property string $prefac
 * @property int $numfac
 *
 * @package App\Models
 */
class PtesaNotaCredito extends Model
{
	protected $table = 'ptesa_nota_credito';
	public $timestamps = false;

	protected $casts = [
		'numero' => 'int',
		'numfac' => 'int'
	];

	protected $fillable = [
		'prefijo',
		'numero',
		'request',
		'response',
		'codigoRespuesta',
		'prefac',
		'numfac'
	];
}
