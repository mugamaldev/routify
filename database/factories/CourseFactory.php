<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Course::class;
    
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 50, 300);
        $sale = $this->faker->boolean(40) ? $this->faker->randomFloat(2, 10, max(10, $price - 5)) : null;
        return [
            'title' => $this->faker->sentence(3),
            'course_image' => 'images/courses/' . strtolower(str_replace(' ', '-', $this->faker->words(2, true))) . '.jpg',
            'course_description' => $this->faker->paragraph(),
            'duration' => 0,
            'price' => $price,
            'sale_price' => $sale,
        ];
    }
}
