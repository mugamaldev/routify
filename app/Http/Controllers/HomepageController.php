<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $user = Auth::user();

        if(!Auth::check()) {
            // return redirect->route('login');
        }

        return view('homepage', compact('user'));
    }
}
