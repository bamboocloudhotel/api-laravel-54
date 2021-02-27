<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BambooInstanceRoom extends Model
{
    //

    public function bambooInstance()
    {
        return $this->belongsTo(BambooInstance::class);
    }
}
