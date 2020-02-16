<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SecUsersGroup
 * 
 * @property string $login
 * @property int $group_id
 * 
 * @property SecUser $sec_user
 * @property SecGroup $sec_group
 *
 * @package App\Models
 */
class SecUsersGroup extends Model
{
	protected $table = 'sec_users_groups';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int'
	];

	public function sec_user()
	{
		return $this->belongsTo(SecUser::class, 'login');
	}

	public function sec_group()
	{
		return $this->belongsTo(SecGroup::class, 'group_id');
	}
}
