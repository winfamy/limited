<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Group extends Eloquent
{

    protected $fillable = [
        'group_id', 'name', 'body', 'owner_id'
    ];

}
