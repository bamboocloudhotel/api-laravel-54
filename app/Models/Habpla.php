<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habpla
 * 
 * @property string $numhab
 * @property string $piso
 * @property int $x1
 * @property int $y1
 * @property int $x2
 * @property int $y2
 * @property int $width
 * @property int $height
 *
 * @package App\Models
 */
class Habpla extends Model
{
	protected $table = 'habpla';
	protected $primaryKey = 'numhab';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'x1' => 'int',
		'y1' => 'int',
		'x2' => 'int',
		'y2' => 'int',
		'width' => 'int',
		'height' => 'int'
	];

	protected $fillable = [
		'piso',
		'x1',
		'y1',
		'x2',
		'y2',
		'width',
		'height'
	];
}
