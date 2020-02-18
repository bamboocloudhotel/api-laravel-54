<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilesPerm
 * 
 * @property int $id
 * @property int $codusu
 * @property int $files_id
 * @property string $pread
 * @property string $pwrite
 *
 * @package App\Models
 */
class FilesPerm extends Model
{
	protected $table = 'files_perms';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int',
		'files_id' => 'int'
	];

	protected $fillable = [
		'codusu',
		'files_id',
		'pread',
		'pwrite'
	];
}
