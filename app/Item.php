<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Item extends Eloquent
{
    protected $fillable = [
        'item_id', 'stock', 'name', 'img', 'rap', 'demand'
    ];

    public static function getID($link) {
        preg_match("/\?id=(\d*)/", $link, $matches);
        return $matches[1];
    }
}
