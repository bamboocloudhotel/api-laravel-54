<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ach
 * 
 * @property int $id
 * @property int $id_ws
 * @property float $valor
 * @property string $documento
 * @property string $correo
 * @property float $iva
 * @property string $referencia
 * @property string $estado
 * @property string $returncode
 * @property string $errormessage
 * @property string $state
 * @property string $amount
 * @property string $vatamount
 * @property string $bankcode
 * @property string $bankname
 * @property string $trazabilitycode
 * @property string $cyclenumber
 *
 * @package App\Models
 */
class Ach extends Model
{
	protected $table = 'ach';
	public $timestamps = false;

	protected $casts = [
		'id_ws' => 'int',
		'valor' => 'float',
		'iva' => 'float'
	];

	protected $fillable = [
		'id_ws',
		'valor',
		'documento',
		'correo',
		'iva',
		'referencia',
		'estado',
		'returncode',
		'errormessage',
		'state',
		'amount',
		'vatamount',
		'bankcode',
		'bankname',
		'trazabilitycode',
		'cyclenumber'
	];
}
