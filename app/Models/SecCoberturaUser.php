<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SecCoberturaUser
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
class SecCoberturaUser extends Model
{
	protected $table = 'sec_cobertura_users';
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
