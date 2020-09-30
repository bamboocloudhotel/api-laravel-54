<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venpo
 * 
 * @property int $id
 * @property int $salon_id
 * @property string $prefac
 * @property int $numfac
 * @property Carbon $fecha
 * @property string $cedula
 * @property int $codcar
 * @property int $menus_items_id
 * @property float $valor
 * @property float $iva
 * @property float $impo
 * @property float $valser
 * @property float $total
 *
 * @package App\Models
 */
class Venpo extends Model
{
	protected $table = 'venpos';
	public $timestamps = false;

	protected $casts = [
		'salon_id' => 'int',
		'numfac' => 'int',
		'codcar' => 'int',
		'menus_items_id' => 'int',
		'valor' => 'float',
		'iva' => 'float',
		'impo' => 'float',
		'valser' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'salon_id',
		'prefac',
		'numfac',
		'fecha',
		'cedula',
		'codcar',
		'menus_items_id',
		'valor',
		'iva',
		'impo',
		'valser',
		'total'
	];
}
