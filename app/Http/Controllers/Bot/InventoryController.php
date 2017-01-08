<?php

namespace App\Http\Controllers\Bot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stamp;

class InventoryController extends Controller
{
    public function user() {}
    
    public function owners(Request $request) {
        foreach($request->owners as $owner) {
            $stamp = Stamp::where('type', 'uaid')->where('value', $owner['uaid'])->orderBy('created_at', 'desc')->first();
            if(is_null($stamp) || $stamp->object_id != $owner['owner'])
                Stamp::create([
                    'type' => 'uaid',
                    'value' => $owner['uaid'],
                    'object_id' => $owner['owner']
                ]);
        }
        return 'megalul';
    }
}
