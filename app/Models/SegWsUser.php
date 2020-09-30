<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SegWsUser
 * 
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * 
 * @property Collection|SegWsUsersGroup[] $seg_ws_users_groups
 *
 * @package App\Models
 */
class SegWsUser extends Model
{
	protected $table = 'seg_ws_users';
	protected $primaryKey = 'login';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'pswd',
		'name',
		'email',
		'active',
		'activation_code',
		'priv_admin'
	];

	public function seg_ws_users_groups()
	{
		return $this->hasMany(SegWsUsersGroup::class, 'login');
	}
}
