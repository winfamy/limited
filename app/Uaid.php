<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Uaid extends Eloquent
{
    protected $fillable = [
        'uaid', 'item_id', 'serial', 'history'
    ];

    public function item() {
        return $this->belongsTo('App\Item', 'item_id', 'item_id');
    }
}
