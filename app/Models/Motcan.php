<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Motcan
 * 
 * @property int $motcan
 * @property string $detalle
 *
 * @package App\Models
 */
class Motcan extends Model
{
    protected $connection = 'on_the_fly';
	protected $table = 'motcan';
	protected $primaryKey = 'motcan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'motcan' => 'int'
	];

	protected $fillable = [
		'detalle',
		'motcan',
	];
}
