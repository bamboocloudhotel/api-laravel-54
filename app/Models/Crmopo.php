<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmopo
 * 
 * @property int $id
 * @property string $tipcli
 * @property string $nombre
 * @property Carbon $fecexp
 * @property string $estado
 * @property int $probab
 * @property int $codusu
 * @property string $nota
 *
 * @package App\Models
 */
class Crmopo extends Model
{
	protected $table = 'crmopo';
	public $timestamps = false;

	protected $casts = [
		'probab' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fecexp'
	];

	protected $fillable = [
		'tipcli',
		'nombre',
		'fecexp',
		'estado',
		'probab',
		'codusu',
		'nota'
	];
}
