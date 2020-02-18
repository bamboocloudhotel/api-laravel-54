<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blohab
 * 
 * @property int $codblo
 * @property Carbon $fecini
 * @property Carbon $fecfin
 * @property Carbon $fecdes
 * @property string $numhab
 * @property int $estblo
 * @property int $motdes
 * @property string $nota
 *
 * @package App\Models
 */
class Blohab extends Model
{
	protected $table = 'blohab';
	protected $primaryKey = 'codblo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codblo' => 'int',
		'estblo' => 'int',
		'motdes' => 'int'
	];

	protected $dates = [
		'fecini',
		'fecfin',
		'fecdes'
	];

	protected $fillable = [
		'fecini',
		'fecfin',
		'fecdes',
		'numhab',
		'estblo',
		'motdes',
		'nota'
	];
}
