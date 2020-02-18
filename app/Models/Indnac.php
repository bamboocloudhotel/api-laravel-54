<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indnac
 * 
 * @property string $codigo
 * @property string $nombre
 * @property float $valor
 * @property float $valadm
 * @property int $codcar
 * @property int $codadm
 * @property string $valfij
 *
 * @package App\Models
 */
class Indnac extends Model
{
	protected $table = 'indnac';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'valor' => 'float',
		'valadm' => 'float',
		'codcar' => 'int',
		'codadm' => 'int'
	];

	protected $fillable = [
		'nombre',
		'valor',
		'valadm',
		'codcar',
		'codadm',
		'valfij'
	];
}
