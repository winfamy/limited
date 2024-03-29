<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Stamp extends Eloquent
{
    protected $fillable = ['type', 'object_id', 'value'];

    public function user() {
        return $this->belongsTo('App\User', 'roblox_user_id', 'object_id');
    }

    public function place() {
        return $this->belongsTo('App\Place', 'place_id', 'object_id');
    }
}
