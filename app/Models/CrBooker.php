<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrBooker extends Model
{
	public $connection = 'hhotel5';
	protected $table = 'cr_bookers';
	public $incrementing = true;
    public $timestamps = false;
	protected $fillable = [
		'givenname',
		'surname',
		'phone',
		'email',
		'address',
		'city',
		'postal_code',
		'country',
	];
	
	
	public function reservas() {
		return $this->hasMany(\App\Models\CrBookerReserva::class, 'booker_id', 'id');
	}
}
