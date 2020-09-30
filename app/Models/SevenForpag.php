<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SevenForpag
 * 
 * @property int $cons
 * @property int $forpag
 * @property string $deatalle
 * @property int $seven_forpag
 * @property string $tac_codi
 * @property string $ban_codi
 *
 * @package App\Models
 */
class SevenForpag extends Model
{
	protected $table = 'seven_forpag';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $casts = [
		'forpag' => 'int',
		'seven_forpag' => 'int'
	];

	protected $fillable = [
		'forpag',
		'deatalle',
		'seven_forpag',
		'tac_codi',
		'ban_codi'
	];
}
