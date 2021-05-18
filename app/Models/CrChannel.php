<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrChannel extends Model
{
	public $connection = 'on_the_fly';

	protected $table = 'cr_channels';
	public $incrementing = false;
    public $timestamps = false;
	protected $fillable = [
		'channel_code',
		'NIT',
		'tipseg',
		'tipres',
		'codcan',
	];

	
	public function empresa() {
		return $this->hasOne(\App\Models\Empresa::class, 'nit', 'NIT');
	}
}
