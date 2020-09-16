<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Private
 * 
 * @property string $mac
 * @property string $estado
 *
 * @package App\Models
 */
class Private extends Model
{
	protected $table = 'private';
	protected $primaryKey = 'mac';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'estado'
	];
}
