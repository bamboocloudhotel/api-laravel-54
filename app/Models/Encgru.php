<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encgru
 * 
 * @property int $encgru
 * @property string $detalle
 *
 * @package App\Models
 */
class Encgru extends Model
{
	protected $table = 'encgru';
	protected $primaryKey = 'encgru';
	public $timestamps = false;

	protected $fillable = [
		'detalle'
	];
}
