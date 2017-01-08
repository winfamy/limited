<?php

namespace App\Library;

use App\Stamp;
use App\Library\RobloxAPI;
use App\Item;
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

    public static function pull($user_id) {
        $api = resolve('App\Library\RobloxAPI');
        //if(!is_null($cached = Cache::get("inventory.$user_id")))
        //    return $cached;
        $items = $api->getInventory($user_id);
        Cache::put("inventory.$user_id", $items, 5);
        $resp = [];

        foreach($items as $item) {
            $id = (int)Item::getID($item['link']);
            $roblox_item = Item::where('item_id', $id)->first();
            $resp[] = $roblox_item;
        }

        return $resp;
    }

}

?>
