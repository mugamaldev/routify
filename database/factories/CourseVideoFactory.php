<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseVideo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseVideo>
 */
class CourseVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = CourseVideo::class;

    public function definition(): array
    {
        return [
             'title' => $this->faker->sentence(4),
            'video_url' => 'https://example.com/videos/' . $this->faker->unique()->word() . '.mp4',
            'duration' => $this->faker->numberBetween(180, 1800),
            'description' => $this->faker->optional()->sentence(),
        ];
    }
}
