<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 * 
 * @property int $id
 * @property int $codusu
 * @property string $note
 *
 * @package App\Models
 */
class Note extends Model
{
	protected $table = 'notes';
	public $timestamps = false;

	protected $casts = [
		'codusu' => 'int'
	];

	protected $fillable = [
		'codusu',
		'note'
	];
}
