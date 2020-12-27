<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrBookerReserva extends Model
{
	public $connection = 'hhotel5';
	protected $table = 'cr_booker_reserva';
	public $incrementing = true;
	public $timestamps = false;

	protected $fillable = [
		'booker_id',
		'numres',
		'amount',
		'date',
		'booker_name'
	];
	
	public function reserva() {
		return $this->belongsTo(\App\Models\Reserva::class, 'numres', 'numres');
	}
	
	public function booker() {
		return $this->belongsTo(\App\Models\CrBooker::class, 'booker_id', 'id');
	}
}
