<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MagentaFile
 * 
 * @property int $id
 * @property int $issues_id
 * @property string $filename
 * @property string $content_type
 * @property string $path
 *
 * @package App\Models
 */
class MagentaFile extends Model
{
	protected $table = 'magenta_files';
	public $timestamps = false;

	protected $casts = [
		'issues_id' => 'int'
	];

	protected $fillable = [
		'issues_id',
		'filename',
		'content_type',
		'path'
	];
}
