<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    public function allCourses() {
        $courses = Course::all();
        $user = Auth::user();
        return view('courses.course', [
            'courses' => $courses,
            'user' => $user,
        ]);
    }
}
