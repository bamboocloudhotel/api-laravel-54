<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SecGroup
 * 
 * @property int $group_id
 * @property string $description
 * 
 * @property Collection|SecGroupsApp[] $sec_groups_apps
 * @property Collection|SecUsersGroup[] $sec_users_groups
 *
 * @package App\Models
 */
class SecGroup extends Model
{
	protected $table = 'sec_groups';
	protected $primaryKey = 'group_id';
	public $timestamps = false;

	protected $fillable = [
		'description'
	];

	public function sec_groups_apps()
	{
		return $this->hasMany(SecGroupsApp::class, 'group_id');
	}

	public function sec_users_groups()
	{
		return $this->hasMany(SecUsersGroup::class, 'group_id');
	}
}
