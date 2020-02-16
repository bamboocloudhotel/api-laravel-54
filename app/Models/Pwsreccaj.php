<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pwsreccaj
 * 
 * @property int $cons
 * @property string $fop_codi
 * @property string $ban_codi
 * @property string $tac_codi
 * @property string $arb_csuc
 * @property string $top_codi
 * @property string $cl_codi
 * @property string $cja_codi
 *
 * @package App\Models
 */
class Pwsreccaj extends Model
{
	protected $table = 'pwsreccaj';
	protected $primaryKey = 'cons';
	public $timestamps = false;

	protected $fillable = [
		'fop_codi',
		'ban_codi',
		'tac_codi',
		'arb_csuc',
		'top_codi',
		'cl_codi',
		'cja_codi'
	];
}
