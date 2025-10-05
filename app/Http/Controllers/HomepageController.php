<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
class HomepageController extends Controller
{
    public function index() {
        $user = Auth::user();
        $courses = Course::latestCourses()->withCount('reviews')->withAvg('reviews', 'rating')->get();
        $categories = Category::limit(3)->get();
        if(!Auth::check()) {
            // return redirect->route('login');
        }

        return view('homepage', compact('user', 'courses', 'categories'));
    }
}
