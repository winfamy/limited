<?php

namespace App\Http\Controllers\Bot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function user() {}
    
    public function owners(Request $request) {
        $json = json_decode($request->json);
        foreach($json->owners as $owner) {
            $stamp = Stamp::where('type', 'uaid')->where('value', $owner->uaid)->sortBy('created_at', 'desc')->first();
            if(is_null($stamp) || $stamp->object_id == $owner->user_id)
                Stamp::create([
                    'type' => 'uaid',
                    'value' => $owner->uaid,
                    'object_id' => $request->user_id
                ]);
        }
        return 'megalul';
    }
}
