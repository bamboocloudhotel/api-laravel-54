<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SegWsGroupsApp
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
 * @property SegWsGroup $seg_ws_group
 * @property SegWsApp $seg_ws_app
 *
 * @package App\Models
 */
class SegWsGroupsApp extends Model
{
	protected $table = 'seg_ws_groups_apps';
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

	public function seg_ws_group()
	{
		return $this->belongsTo(SegWsGroup::class, 'group_id');
	}

	public function seg_ws_app()
	{
		return $this->belongsTo(SegWsApp::class, 'app_name');
	}
}
