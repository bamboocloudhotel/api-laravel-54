<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salone
 * 
 * @property int $codsal
 * @property string $abrev
 * @property string $nombre
 * @property int $antmet
 * @property int $larmet
 * @property string $nota
 * @property string $estado
 *
 * @package App\Models
 */
class Salone extends Model
{
	protected $table = 'salones';
	protected $primaryKey = 'codsal';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codsal' => 'int',
		'antmet' => 'int',
		'larmet' => 'int'
	];

	protected $fillable = [
		'abrev',
		'nombre',
		'antmet',
		'larmet',
		'nota',
		'estado'
	];
}
