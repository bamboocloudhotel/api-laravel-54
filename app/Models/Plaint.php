<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plaint
 * 
 * @property int $codigo
 * @property int $gruint
 * @property string $nombre
 * @property string $descripcion
 * @property string $garantia
 * @property string $cancelacion
 * @property int $codcla
 * @property int $numini
 * @property int $numfin
 * @property int $minnoc
 * @property float $valor
 * @property float $iva
 * @property float $total
 * @property float $valorn
 * @property string $promocion
 * @property string $codpro
 * @property string $restringido
 * @property string $estado
 *
 * @package App\Models
 */
class Plaint extends Model
{
	protected $table = 'plaint';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'gruint' => 'int',
		'codcla' => 'int',
		'numini' => 'int',
		'numfin' => 'int',
		'minnoc' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'total' => 'float',
		'valorn' => 'float'
	];

	protected $fillable = [
		'gruint',
		'nombre',
		'descripcion',
		'garantia',
		'cancelacion',
		'codcla',
		'numini',
		'numfin',
		'minnoc',
		'valor',
		'iva',
		'total',
		'valorn',
		'promocion',
		'codpro',
		'restringido',
		'estado'
	];
}
