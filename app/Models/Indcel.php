<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indcel
 * 
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codadm
 * @property int $codcar
 *
 * @package App\Models
 */
class Indcel extends Model
{
	protected $table = 'indcel';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'valor' => 'float',
		'valadm' => 'float',
		'codadm' => 'int',
		'codcar' => 'int'
	];

	protected $fillable = [
		'nombre',
		'valor',
		'valadm',
		'codadm',
		'codcar'
	];
}
