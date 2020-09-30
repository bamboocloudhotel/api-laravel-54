<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SecUser
 * 
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 * 
 * @property Collection|SecUsersGroup[] $sec_users_groups
 *
 * @package App\Models
 */
class SecUser extends Model
{
	protected $table = 'sec_users';
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

	public function sec_users_groups()
	{
		return $this->hasMany(SecUsersGroup::class, 'login');
	}
}
