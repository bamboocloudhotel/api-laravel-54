<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encpregru
 * 
 * @property int $encpregru
 * @property int $encgru
 * @property string $pregunta
 *
 * @package App\Models
 */
class Encpregru extends Model
{
	protected $table = 'encpregru';
	protected $primaryKey = 'encpregru';
	public $timestamps = false;

	protected $casts = [
		'encgru' => 'int'
	];

	protected $fillable = [
		'encgru',
		'pregunta'
	];
}
