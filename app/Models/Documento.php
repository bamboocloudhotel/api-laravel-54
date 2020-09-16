<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documento
 * 
 * @property string $cladoc
 * @property string $nombre
 * @property string $tipo
 *
 * @package App\Models
 */
class Documento extends Model
{
	protected $table = 'documentos';
	protected $primaryKey = 'cladoc';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'tipo'
	];
}
