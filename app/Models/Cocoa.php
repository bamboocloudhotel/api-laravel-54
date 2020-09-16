<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cocoa
 * 
 * @property int $numruc
 * @property string $razsoc
 * @property string $dirmat
 * @property int $telefono
 * @property int $fax
 * @property string $email
 * @property string $tiprep
 * @property int $numrep
 * @property int $ruccon
 *
 * @package App\Models
 */
class Cocoa extends Model
{
	protected $table = 'cocoa';
	protected $primaryKey = 'numruc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numruc' => 'int',
		'telefono' => 'int',
		'fax' => 'int',
		'numrep' => 'int',
		'ruccon' => 'int'
	];

	protected $fillable = [
		'razsoc',
		'dirmat',
		'telefono',
		'fax',
		'email',
		'tiprep',
		'numrep',
		'ruccon'
	];
}
