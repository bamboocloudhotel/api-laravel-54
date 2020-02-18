<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 * 
 * @property int $id
 * @property string $relay_key
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class Delivery extends Model
{
	protected $table = 'delivery';
	public $timestamps = false;

	protected $fillable = [
		'relay_key'
	];
}
