<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Hash;

class User extends Eloquent
{

    protected $fillable = [
        'roblox_user_id', 'name', 'password', 'roles', 'verified' 
    ];

    public function roblox_user() {
        return $this->belongsTo('App\RobloxUser');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}
