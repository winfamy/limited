<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use App\User;

use Auth;
use Hash;

class LoginController extends Controller
{
    public function root() {
        return view('client.auth.auth');
    }

    public function login(LoginRequest $request) {
        $user = User::where('name', $request->name)->first();
        //dd($user);
        if(password_verify($request->password, $user->password)) {
            Auth::login($user, true);
            return redirect('/')->withErrors(["Welcome back, $request->name"]);
        }

        return redirect('/login')->withErrors(['Login failed.']);
    }
}
