<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

use App\RobloxUser;
use App\User;
use App\Token;

use Hash;
use Auth;

class RegisterController extends Controller
{
    public function root() {
        return view('client.auth.auth', ['register' => true]);
    }

    public function register(RegisterRequest $request) {
        $roblox_user = RobloxUser::where('name', $request->name)->first();
        if(is_null($roblox_user)) {
            if(is_null( $roblox_user = RobloxUser::fetch($request->name) ))
                return redirect()->back()->withErrors(['ROBLOX username invalid. :(']);
        }

        $token = Token::create([
            'type' => 'connect',
            'user_id' => $roblox_user->user_id,
            'token' => str_random(8)
        ]);

        session([
            'name' => $request->name,
            'password' => $request->password,
            'token' => $token->token
        ]);

        return redirect('/confirm');
    }

    public function confirm(Request $request) {
        if(is_null(session('token')))
            return redirect('/register');
        return view('client.auth.confirm', ['token' => session('token'), 'username' => session('name')]);
    }

    public function check(Request $request) {
        $api = resolve('App\Library\RobloxAPI');
        if(is_null(session('token')))
            return response()->json(['status' => false, 'msg' => 'No token saved, restart registration.']);

        $token = Token::where('token', session('token'))->first();
        if( $api->getStatus($token->user_id) != session('token') )
            return response()->json(['status' => false, 'msg' => 'Verification failed']);
        
        $user = User::create([
            'roblox_user_id' => $token->user_id,
            'name' => session('name'),
            'password' => session('password'),
            'roles' => [],
            'verified' => 1
        ]);
        Auth::login($user, true);
        
        return response()->json(['status' => true]);
    }
}
