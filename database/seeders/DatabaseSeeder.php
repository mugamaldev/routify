<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\Review;
use App\Models\Enrollment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = Category::factory()->count(5)->create();
        $users = User::factory()->count(8)->create();
        $admin = User::factory()->admin()->create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'name' => 'Muhammad Admin'
        ]);

        $courses = collect();
        for($i=0;$i<6;$i++) {
            $course  = Course::factory()->make();
            $course->category_id = $categories->random()->id;
            $course->instructor_id = $users->random()->id;
            $course->save();
            $courses->push($course);
        }
        foreach ($courses as $course) {
            $count = rand(3, 7);
            CourseVideo::factory()->count($count)->create([
                'course_id' => $course->id,
            ]);

            // حساب المدة الإجمالية (ثواني)
            $total = $course->videos()->sum('duration');
            $course->updateQuietly(['duration' => $total]);
        }

        // 5. Reviews (لكل كورس نولّد كم review عشوائي)
        foreach ($courses as $course) {
            $rCount = rand(2, 8);
            for ($j = 0; $j < $rCount; $j++) {
                Review::factory()->create([
                    'course_id' => $course->id,
                    'user_id' => $users->random()->id,
                ]);
            }
        }

        // 6. Enrollments: كل يوزر نشترك له في 1-4 كورسات (بدون تكرار)
        foreach ($users as $user) {
            $take = rand(1, min(4, $courses->count()));
            $picked = $courses->random($take)->pluck('id')->toArray();
            foreach ($picked as $courseId) {
                Enrollment::firstOrCreate([
                    'user_id' => $user->id,
                    'course_id' => $courseId,
                ]);
            }
        }

        $this->command->info("Seeding finished: {$categories->count()} categories, {$users->count()} users, {$courses->count()} courses.");
    }
}
