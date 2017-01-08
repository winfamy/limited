<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Item extends Eloquent
{
    //

    public static function getID($link) {
        preg_match("/\?id=(\d*)/", $link, $matches);
        return $matches[1];
    }
}
