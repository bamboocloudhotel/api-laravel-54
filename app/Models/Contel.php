<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contel
 * 
 * @property int $codigo
 * @property string $pricam
 * @property string $segcam
 * @property string $tercam
 * @property string $cuacam
 * @property string $quicam
 * @property string $sexcam
 * @property string $sepcam
 * @property string $octcam
 * @property int $cobapa
 * @property string $nit
 * @property string $extadm
 * @property string $regnoc
 *
 * @package App\Models
 */
class Contel extends Model
{
	protected $table = 'contel';
	protected $primaryKey = 'codigo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo' => 'int',
		'cobapa' => 'int'
	];

	protected $fillable = [
		'pricam',
		'segcam',
		'tercam',
		'cuacam',
		'quicam',
		'sexcam',
		'sepcam',
		'octcam',
		'cobapa',
		'nit',
		'extadm',
		'regnoc'
	];
}
