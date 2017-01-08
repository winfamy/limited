<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request) {
        $start = substr($request->input, 0);
        switch($start) {
            case "?":
                break;
            case "$":
                break;
            default: 
                return redirect("/u/$request->input");
        }
    }
}
