<?php

namespace App\Library;

use App\Library\RobloxAPI;
use App\Jobs\Inventory\Save;

use App\Uaid;
use App\Item;

use Cache;

class InventoryHandler {

    public static function save($inventory, $user_id) {
        foreach($inventory as $item) {
            $id = (int)Item::getID($item['link']);
            $uaid = Uaid::where('uaid', $item['uaid'])->first();
            if(is_null($uaid)) {
                Uaid::create([
                    'uaid' => $item['uaid'],
                    'item_id' => $id,
                    'serial' => ($item['serial'] != '---') ? (int)$item['serial'] : null,
                    'history' => [
                        [
                            'timestamp' => time(),
                            'user_id' => $user_id
                        ]
                    ]
                ]);
                continue;
            }

            $owner = collect($uaid->history)->sortByDesc('timestamp')->first();
            if($owner['user_id'] != $user_id)
                $uaid->push('history', [ 'timestamp' => time(), 'user_id' => $user_id ]);
        }
    }

    public static function pull($user_id) {
        $api = resolve('App\Library\RobloxAPI');
        //if(!is_null($cached = Cache::get("inventory.$user_id")))
            //return $cached;
        $json = $api->getInventory($user_id);
        $items = $json['data'];
        $resp = [];

        $items_unique = collect($items)->unique('name')->sortByDesc('rap')->values()->all();
        foreach ($items_unique as &$item) {
            $id = (int)Item::getID($item['link']);
            $item['count'] = collect($items)->where('name', $item['name'])->count();
        }
        Cache::put("inventory.$user_id", $items_unique, 5);
        dispatch(new Save($items, $user_id));
        return [
            'meta' => [
                "rap" => $json['meta']['rap'],
                "count" => $json['meta']['count']
            ],
            'data' => $items_unique
        ];
    }
}

?>

