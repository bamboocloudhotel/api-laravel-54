<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaEstadosFactura
 * 
 * @property int $id
 * @property string $nombre
 * @property bool $permiteCambio
 *
 * @package App\Models
 */
class PtesaEstadosFactura extends Model
{
	protected $table = 'ptesa_estados_factura';
	public $timestamps = false;

	protected $casts = [
		'permiteCambio' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'permiteCambio'
	];
}
