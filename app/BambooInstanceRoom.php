<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BambooInstanceRoom extends Model
{
    //
    protected $fillable = [
        'bamboo_instance_id',
        'bb_room',
        'rg_room',
    ];

    public function bambooInstance()
    {
        return $this->belongsTo(BambooInstance::class);
    }
}
