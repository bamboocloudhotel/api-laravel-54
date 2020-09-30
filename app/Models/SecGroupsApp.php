<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SecGroupsApp
 * 
 * @property int $group_id
 * @property string $app_name
 * @property string $priv_access
 * @property string $priv_insert
 * @property string $priv_delete
 * @property string $priv_update
 * @property string $priv_export
 * @property string $priv_print
 * 
 * @property SecGroup $sec_group
 * @property SecApp $sec_app
 *
 * @package App\Models
 */
class SecGroupsApp extends Model
{
	protected $table = 'sec_groups_apps';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int'
	];

	protected $fillable = [
		'priv_access',
		'priv_insert',
		'priv_delete',
		'priv_update',
		'priv_export',
		'priv_print'
	];

	public function sec_group()
	{
		return $this->belongsTo(SecGroup::class, 'group_id');
	}

	public function sec_app()
	{
		return $this->belongsTo(SecApp::class, 'app_name');
	}
}
