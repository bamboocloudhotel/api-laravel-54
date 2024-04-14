<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationChange extends Model
{
    //
    protected $fillable = [
        'parent_id',
        'hotel_id',
        'numres',
        'reference',
        'type',
        'data'
    ];
}
