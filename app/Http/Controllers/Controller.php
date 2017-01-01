<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(\App\Library\RobloxAPI $api) {
        //dd($api->getInventory(261));
        //ss\Cache::put('inventory.261', $api->getInventory(261), 5);
        return dd(\Cache::pull('inventory.261'));
    }
}
