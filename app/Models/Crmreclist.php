<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmreclist
 * 
 * @property int $id
 * @property int $crmlists_id
 * @property string $cedula
 *
 * @package App\Models
 */
class Crmreclist extends Model
{
	protected $table = 'crmreclist';
	public $timestamps = false;

	protected $casts = [
		'crmlists_id' => 'int'
	];

	protected $fillable = [
		'crmlists_id',
		'cedula'
	];
}
