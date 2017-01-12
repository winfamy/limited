<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\InventoryHandler as Inventory;

use App\RobloxUser;

class InventoryController extends Controller
{
    public function get($name) {
        $user = RobloxUser::where('name', $name)->first();
        if(is_null($user))
            $user = RobloxUser::fetch($name);

        if(is_null($user))
            return response()->json(['status' => false, 'msg' => 'ROBLOX account not found.']);

        return response()->json( Inventory::pull($user->user_id) );
    }
}
