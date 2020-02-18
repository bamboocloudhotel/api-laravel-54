<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perfil
 * 
 * @property int $codprf
 * @property string $detalle
 *
 * @package App\Models
 */
class Perfil extends Model
{
	protected $table = 'perfil';
	protected $primaryKey = 'codprf';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codprf' => 'int'
	];

	protected $fillable = [
		'detalle'
	];
}
