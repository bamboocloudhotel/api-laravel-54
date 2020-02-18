<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParamProduc
 * 
 * @property int $cons
 * @property string $cod_cargo
 * @property string $pro_codi
 * @property string $abr_codc
 *
 * @package App\Models
 */
class ParamProduc extends Model
{
	protected $table = 'param_produc';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $fillable = [
		'cod_cargo',
		'pro_codi',
		'abr_codc'
	];
}
