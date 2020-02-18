<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmemacam
 * 
 * @property int $id
 * @property int $codcam
 * @property string $subject
 * @property string $image_key
 * @property string $url
 * @property string $texto
 *
 * @package App\Models
 */
class Crmemacam extends Model
{
	protected $table = 'crmemacam';
	public $timestamps = false;

	protected $casts = [
		'codcam' => 'int'
	];

	protected $fillable = [
		'codcam',
		'subject',
		'image_key',
		'url',
		'texto'
	];
}
