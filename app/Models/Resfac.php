<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Resfac
 * 
 * @property int $id
 * @property string $nombre
 * @property string $resfac
 * @property Carbon $fecfac
 * @property string $prefac
 * @property int $numfac
 * @property int $numfai
 * @property int $numfaf
 * @property string $estado
 * @property string $notas
 * @property string $tipofactura
 *
 * @package App\Models
 */
class Resfac extends Model
{
	protected $table = 'resfac';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'numfac' => 'int',
		'numfai' => 'int',
		'numfaf' => 'int'
	];

	protected $dates = [
		'fecfac'
	];

	protected $fillable = [
		'nombre',
		'resfac',
		'fecfac',
		'prefac',
		'numfac',
		'numfai',
		'numfaf',
		'estado',
		'notas',
		'tipofactura'
	];
}
