<?php

namespace App\Library;

use App\Stamp;
use App\Library\RobloxAPI;
use Cache;

class InventoryHandler {

    public static function save($inventory, $user_id) {
        foreach($inventory as $item) {
            $stamp = Stamp::where('type', 'uaid')->where('value', $item['uaid'])->orderBy('created_at', 'desc')->first();
            if($stamp->object_id == $user_id) { continue; }
            
            Stamp::create([
                'type'      => 'uaid',
                'object_id' => $user_id,
                'value'     => $item['uaid'] 
            ]);
        }
    }

    public static function pull(RobloxAPI $api, $user_id) {
        if(!is_null($cached = Cache::pull('inventory.' . (string)$user_id)))
            return $cached;
        return $api->getInventory($user_id);
    }

}

?>
