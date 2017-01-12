<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Library\RobloxAPI;

class RobloxUser extends Eloquent {

    protected $fillable = [
        'user_id', 'name', 'names', 'posts', 'joined_at'
    ];

    protected $dates = ['joined_at'];

    public function user() {
        return $this->hasOne('App\User');
    }

    public static function fetch($username) {
        $api = resolve('App\Library\RobloxAPI');
        $id = $api->getUserId($username);
        return (!is_null($id)) ? 
            RobloxUser::firstOrNew([
                'name' => $username,
                'user_id' => $id,
                'names' => [],
                'posts' => 0,
                'joined_at' => null
            ])
        : null;
    }
}