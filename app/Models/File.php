<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property string $titulo
 * @property string $rname
 * @property string $path
 * @property string $mime
 * @property int $fsize
 * @property Carbon $fcreated
 * @property string $ubica
 * @property int $codusu
 * @property string $fpassword
 * @property string $encrypt
 * @property string $status
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';
	public $timestamps = false;

	protected $casts = [
		'fsize' => 'int',
		'codusu' => 'int'
	];

	protected $dates = [
		'fcreated'
	];

	protected $hidden = [
		'fpassword'
	];

	protected $fillable = [
		'titulo',
		'rname',
		'path',
		'mime',
		'fsize',
		'fcreated',
		'ubica',
		'codusu',
		'fpassword',
		'encrypt',
		'status'
	];
}
