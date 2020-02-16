<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 * 
 * @property int $codgru
 * @property string $detalle
 * @property string $tipo
 * @property string $genest
 *
 * @package App\Models
 */
class Grupo extends Model
{
	protected $table = 'grupos';
	protected $primaryKey = 'codgru';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codgru' => 'int'
	];

	protected $fillable = [
		'detalle',
		'tipo',
		'genest'
	];
}
