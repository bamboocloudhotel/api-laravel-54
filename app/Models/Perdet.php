<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Perdet
 * 
 * @property int $id
 * @property int $perabo_id
 * @property int $numcue
 * @property int $numrec
 * @property float $valor
 *
 * @package App\Models
 */
class Perdet extends Model
{
	protected $table = 'perdet';
	public $timestamps = false;

	protected $casts = [
		'perabo_id' => 'int',
		'numcue' => 'int',
		'numrec' => 'int',
		'valor' => 'float'
	];

	protected $fillable = [
		'perabo_id',
		'numcue',
		'numrec',
		'valor'
	];
}
