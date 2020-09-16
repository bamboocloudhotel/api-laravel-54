<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SegWsGroup
 * 
 * @property int $group_id
 * @property string $description
 * 
 * @property Collection|SegWsGroupsApp[] $seg_ws_groups_apps
 * @property Collection|SegWsUsersGroup[] $seg_ws_users_groups
 *
 * @package App\Models
 */
class SegWsGroup extends Model
{
	protected $table = 'seg_ws_groups';
	protected $primaryKey = 'group_id';
	public $timestamps = false;

	protected $fillable = [
		'description'
	];

	public function seg_ws_groups_apps()
	{
		return $this->hasMany(SegWsGroupsApp::class, 'group_id');
	}

	public function seg_ws_users_groups()
	{
		return $this->hasMany(SegWsUsersGroup::class, 'group_id');
	}
}
