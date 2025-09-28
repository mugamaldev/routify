<?php

namespace App\Observers;

use App\Models\CourseVideo;
use App\Models\Course;

class CourseVideoObserver
{
    private function updateCourseDuration(Course $course)
    {
        $total = $course->videos()->sum('duration');
        $course->updateQuietly(['duration' => $total]);
    }

    public function created(CourseVideo $courseVideo): void
    {
        $this->updateCourseDuration($courseVideo->course);
    }

    public function updated(CourseVideo $courseVideo): void
    {
        $this->updateCourseDuration($courseVideo->course);
    }

    public function deleted(CourseVideo $courseVideo): void
    {
        $this->updateCourseDuration($courseVideo->course);
    }
}
