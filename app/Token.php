<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Token extends Eloquent
{

    protected $fillable = [
        'type', 'user_id', 'token'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'roblox_user_id');
    }

}
