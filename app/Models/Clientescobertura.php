<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clientescobertura
 * 
 * @property int $cons
 * @property string $tipdoc
 * @property string $numdoc
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Clientescobertura extends Model
{
	protected $table = 'clientescoberturas';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'tipdoc',
		'numdoc',
		'fecha'
	];
}
