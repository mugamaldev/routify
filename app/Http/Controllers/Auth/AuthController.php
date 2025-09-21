<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\UserRole;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function showRegist() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'dzName'        => ['required', 'string', 'max:255'],
            'dzUsername'    => ['required', 'string', 'max:255', 'unique:users,username'],
            'dzEmail'       => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['confirmed', 'required', 'min:8'],
        ]);

        $user = User::create([
            'name'          => $data['dzName'],
            'username'      => $data['dzUsername'],
            'email'         => $data['dzEmail'],
            'password'      => Hash::make($data['password']),
            'role'          => UserRole::USER,
        ]);

        Auth::login($user);

        return redirect()->route('myhome')->with('success', 'You are logged in '. $user->name);
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $creds = $request->validate([
            'dzName' => ['required', 'string', 'exists:users,username'],
            'dzPassword' => ['required', 'string', 'min:8'],
        ]);

        $credentials = [
            'username' => $creds['dzName'],
            'password' => $creds['dzPassword'],
        ];


        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('myhome'));
        }

        return back()->withErrors(['dzName' => __('The provided credentials do not match our records.')])->withInput($request->only('dzName'));

    }

    public function destroy() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('myhome');
    }
}
