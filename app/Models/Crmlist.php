<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crmlist
 * 
 * @property int $id
 * @property string $nombre
 * @property string $tipo
 *
 * @package App\Models
 */
class Crmlist extends Model
{
	protected $table = 'crmlists';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'tipo'
	];
}
