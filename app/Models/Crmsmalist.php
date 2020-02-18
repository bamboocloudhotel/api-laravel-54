<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmsmalist
 * 
 * @property int $id
 * @property int $crmlists_id
 * @property string $tipo
 * @property string $value
 *
 * @package App\Models
 */
class Crmsmalist extends Model
{
	protected $table = 'crmsmalist';
	public $timestamps = false;

	protected $casts = [
		'crmlists_id' => 'int'
	];

	protected $fillable = [
		'crmlists_id',
		'tipo',
		'value'
	];
}
