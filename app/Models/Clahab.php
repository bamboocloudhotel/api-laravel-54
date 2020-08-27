<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clahab
 * 
 * @property int $codcla
 * @property string $clase
 * @property string $descripcion
 * @property string $observacion
 * @property string $uri
 * @property int $numper
 * @property int $tiphab
 *
 * @package App\Models
 */
class Clahab extends Model
{
	protected $table = 'clahab';
	protected $primaryKey = 'codcla';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codcla' => 'int',
		'numper' => 'int',
		'tiphab' => 'int'
	];

	protected $fillable = [
		'clase',
		'descripcion',
		'observacion',
		'uri',
		'numper',
		'tiphab'
	];
}
