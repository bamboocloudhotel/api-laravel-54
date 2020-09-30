<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 * 
 * @property int $id
 * @property string $nombre
 * @property int $position
 *
 * @package App\Models
 */
class Survey extends Model
{
	protected $table = 'survey';
	public $timestamps = false;

	protected $casts = [
		'position' => 'int'
	];

	protected $fillable = [
		'nombre',
		'position'
	];
}
