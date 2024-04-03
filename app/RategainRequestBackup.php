<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RategainRequestBackup extends Model
{
    //
    protected $fillable = [
        'reference',
        'type',
        'request',
        'xml',
        'hotel',
        'response',
        'confirmation_id',
    ];
}
