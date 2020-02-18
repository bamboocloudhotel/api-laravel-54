<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SegWsApp
 * 
 * @property string $app_name
 * @property string $app_type
 * @property string $description
 * 
 * @property Collection|SegWsGroupsApp[] $seg_ws_groups_apps
 *
 * @package App\Models
 */
class SegWsApp extends Model
{
	protected $table = 'seg_ws_apps';
	protected $primaryKey = 'app_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'app_type',
		'description'
	];

	public function seg_ws_groups_apps()
	{
		return $this->hasMany(SegWsGroupsApp::class, 'app_name');
	}
}
