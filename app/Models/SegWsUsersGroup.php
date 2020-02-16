<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SegWsUsersGroup
 * 
 * @property string $login
 * @property int $group_id
 * 
 * @property SegWsUser $seg_ws_user
 * @property SegWsGroup $seg_ws_group
 *
 * @package App\Models
 */
class SegWsUsersGroup extends Model
{
	protected $table = 'seg_ws_users_groups';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int'
	];

	public function seg_ws_user()
	{
		return $this->belongsTo(SegWsUser::class, 'login');
	}

	public function seg_ws_group()
	{
		return $this->belongsTo(SegWsGroup::class, 'group_id');
	}
}
