<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taremp
 * 
 * @property string $nit
 * @property int $codpla
 * @property int $numero
 *
 * @package App\Models
 */
class Taremp extends Model
{
	protected $table = 'taremp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codpla' => 'int',
		'numero' => 'int'
	];

	protected $fillable = [
		'numero'
	];
}
