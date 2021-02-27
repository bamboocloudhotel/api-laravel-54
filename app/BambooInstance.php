<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BambooInstance extends Model
{
    //
    protected $fillable = [
        'name',
        'db_host',
        'db_port',
        'db_database',
        'db_username',
        'db_password',
        'rg_api',
        'rg_auth',
        'rg_hotel_code',
        'rg_username',
        'rg_password',
        'payment_type',
        'warranty_type',
        'program_type',
        'codpla',
        'tipres',
    ];


    public function bambooInstanceRooms()
    {
        return $this->hasMany(BambooInstanceRoom::class);
    }
}
