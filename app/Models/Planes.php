<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plane
 * 
 * @property int $codpla
 * @property string $descripcion
 * @property string $tipper
 * @property int $numper
 * @property string $adicional
 * @property string $tipo
 * @property int $codcla
 * @property int $tippla
 * @property int $tippro
 * @property string $muepre
 * @property string $muefac
 * @property string $observacion
 * @property string $estado
 * @property string $servicios
 *
 * @package App\Models
 */
class Planes extends Model
{
    protected $connection = 'hhotel5';
	protected $table = 'planes';
	protected $primaryKey = 'codpla';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int',
		'numper' => 'int',
		'codcla' => 'int',
		'tippla' => 'int',
		'tippro' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'tipper',
		'numper',
		'adicional',
		'tipo',
		'codcla',
		'tippla',
		'tippro',
		'muepre',
		'muefac',
		'observacion',
		'estado',
		'servicios'
	];
}
