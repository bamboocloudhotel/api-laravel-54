<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parint
 * 
 * @property int $id
 * @property string $pagint
 * @property string $paspag
 * @property int $usuint
 * @property int $forint
 * @property int $conint
 * @property int $resint
 * @property int $venint
 * @property int $grucor
 * @property string $email1
 * @property string $email2
 * @property string $cobseg
 * @property int $usupag
 * @property string $llaenc
 * @property string $enviro
 * @property string $descripcion
 * @property string $nitint
 *
 * @package App\Models
 */
class Parint extends Model
{
	protected $table = 'parint';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'usuint' => 'int',
		'forint' => 'int',
		'conint' => 'int',
		'resint' => 'int',
		'venint' => 'int',
		'grucor' => 'int',
		'usupag' => 'int'
	];

	protected $fillable = [
		'pagint',
		'paspag',
		'usuint',
		'forint',
		'conint',
		'resint',
		'venint',
		'grucor',
		'email1',
		'email2',
		'cobseg',
		'usupag',
		'llaenc',
		'enviro',
		'descripcion',
		'nitint'
	];
}
