<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    public function allCourses() {
        $user = Auth::user();
        $latestCourses = Course::latest('created_at')->withCount('reviews')->withAvg('reviews', 'rating')->limit(3)->get();
        $courses = Course::with(['category', 'instructor'])->withCount('reviews')->withAvg('reviews', 'rating')->paginate(3);
        $categories = Category::all();
        return view('courses.course', [
            'courses' => $courses,
            'user' => $user,
            'categories' => $categories,
            'latestCourses' => $latestCourses,
        ]);
    }

    public function singleCourse(Request $request) {
        $user = Auth::user();
        $course = Course::findOrFail($request->id);
        return view('courses.single', [
            'course' => $course,
            'user' => $user,
        ]);
    }
}
