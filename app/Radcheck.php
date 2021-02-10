<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    public $connection = 'onthefly';
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'radcheck';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'attribute',
        'op',
        'value'
    ];
}
