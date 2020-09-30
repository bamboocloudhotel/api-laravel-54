<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PtesaContratosMandato
 * 
 * @property string $numcont
 * @property string $razsoc
 * @property int $tipdoc
 * @property string $numdoc
 * @property string $nummat
 * @property int $estado
 *
 * @package App\Models
 */
class PtesaContratosMandato extends Model
{
	protected $table = 'ptesa_contratos_mandato';
	protected $primaryKey = 'numcont';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'tipdoc' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'razsoc',
		'tipdoc',
		'numdoc',
		'nummat',
		'estado'
	];
}
