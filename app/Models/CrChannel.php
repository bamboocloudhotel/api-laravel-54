<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrChannel extends Model
{
	public $connection = 'hhotel5';
	protected $table = 'cr_channels';
	public $incrementing = false;
    public $timestamps = false;
	protected $fillable = [
		'channel_code',
		'NIT',
	];
	
	
	public function empresa() {
		return $this->hasOne(\App\Models\Empresa::class, 'nit', 'NIT');
	}
}