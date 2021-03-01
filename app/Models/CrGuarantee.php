<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrGuarantee extends Model
{
	public $connection = 'on_the_fly';
	protected $table = 'cr_guarantees';
	public $incrementing = true;
	public $timestamps = false;
	protected $fillable = [
		'type',
		'code',
		'number',
		'expire',
		'holder',
		'amount',
		'currency',
		'numres'
	];
}
