<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RategainRequest extends Model
{
    //

    protected $fillable = [
    	'reference',
    	'type',
    	'request',
		'xml',
		'hotel'
    ];
}
