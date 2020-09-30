<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendedor
 * 
 * @property int $codven
 * @property string $cedula
 * @property string $nombre
 * @property string $estado
 *
 * @package App\Models
 */
class Vendedor extends Model
{
	protected $table = 'vendedor';
	protected $primaryKey = 'codven';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codven' => 'int'
	];

	protected $fillable = [
		'cedula',
		'nombre',
		'estado'
	];
}
