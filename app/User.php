<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Hash;

class User extends Eloquent implements Authenticatable
{

    protected $fillable = [
        'roblox_user_id', 'name', 'password', 'roles', 'verified', 'remember'
    ];

    public function roblox_user() {
        return $this->belongsTo('App\RobloxUser');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAuthIdentifierName() {
        return '_id';
    }
    public function getAuthIdentifier() {
        return $this->{ $this->getAuthIdentifierName() };
    }
    public function getAuthPassword() {
        return $this->password;
    }
    public function getRememberToken() {
        return $this->remember;
    }
    public function setRememberToken($value) {
        $this->remember = $value;
    }
    public function getRememberTokenName() {
        return 'remember';
    }
}
