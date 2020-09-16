<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryUpdate extends Model
{
    //
    protected $fillable = [
        'booking_engine',
        'room_class_cloud',
        'room_class_local',
        'date_updated',
        'quantity',
        'xml'
    ];
}
