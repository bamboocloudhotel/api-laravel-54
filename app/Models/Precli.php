<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Precli
 * 
 * @property string $cedula
 * @property string $numhab
 * @property int $claini
 * @property int $clafin
 * @property string $atencion
 *
 * @package App\Models
 */
class Precli extends Model
{
	protected $table = 'precli';
	protected $primaryKey = 'cedula';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'claini' => 'int',
		'clafin' => 'int'
	];

	protected $fillable = [
		'numhab',
		'claini',
		'clafin',
		'atencion'
	];
}
