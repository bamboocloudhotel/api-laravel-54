<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipdoc
 * 
 * @property int $tipdoc
 * @property string $detalle
 * @property string $tipcoa
 * @property int $tipint
 *
 * @package App\Models
 */
class Tipdoc extends Model
{
    protected $connection = 'hhotel5';
	protected $table = 'tipdoc';
	protected $primaryKey = 'tipdoc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipdoc' => 'int',
		'tipint' => 'int'
	];

	protected $fillable = [
		'detalle',
		'tipcoa',
		'tipint'
	];
}
