<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Percar
 * 
 * @property int $codigo
 * @property int $codprf
 * @property int $codcar
 * @property string $tipo
 *
 * @package App\Models
 */
class Percar extends Model
{
	protected $table = 'percar';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'codprf' => 'int',
		'codcar' => 'int'
	];

	protected $fillable = [
		'codprf',
		'codcar',
		'tipo'
	];
}
