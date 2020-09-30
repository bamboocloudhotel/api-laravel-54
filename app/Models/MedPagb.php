<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedPagb
 * 
 * @property int $fop_codi
 * @property string $fop_nomb
 *
 * @package App\Models
 */
class MedPagb extends Model
{
	protected $table = 'med_pagb';
	protected $primaryKey = 'fop_codi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fop_codi' => 'int'
	];

	protected $fillable = [
		'fop_nomb'
	];
}
