<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indloc
 * 
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codadm
 * @property int $codcar
 * @property string $valfij
 *
 * @package App\Models
 */
class Indloc extends Model
{
	protected $table = 'indloc';
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
		'codcar',
		'valfij'
	];
}
