<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Motvium
 * 
 * @property int $codmot
 * @property string $detalle
 * @property string $predeterminado
 *
 * @package App\Models
 */
class Motvium extends Model
{
	protected $table = 'motvia';
	protected $primaryKey = 'codmot';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codmot' => 'int'
	];

	protected $fillable = [
		'detalle',
		'predeterminado'
	];
}
