<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
class HomepageController extends Controller
{
    public function index() {
        $user = Auth::user();
        $courses = Course::latestCourses()->withCount('reviews')->withAvg('reviews', 'rating')->get();
        
        if(!Auth::check()) {
            // return redirect->route('login');
        }

        return view('homepage', compact('user', 'courses'));
    }
}
