<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sec1User
 * 
 * @property string $login
 * @property string $pswd
 * @property string $name
 * @property string $email
 * @property string $active
 * @property string $activation_code
 * @property string $priv_admin
 *
 * @package App\Models
 */
class Sec1User extends Model
{
	protected $table = 'sec1_users';
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
}
