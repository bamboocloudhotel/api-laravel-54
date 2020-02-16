<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SecApp
 * 
 * @property string $app_name
 * @property string $app_type
 * @property string $description
 * 
 * @property Collection|SecGroupsApp[] $sec_groups_apps
 *
 * @package App\Models
 */
class SecApp extends Model
{
	protected $table = 'sec_apps';
	protected $primaryKey = 'app_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'app_type',
		'description'
	];

	public function sec_groups_apps()
	{
		return $this->hasMany(SecGroupsApp::class, 'app_name');
	}
}
