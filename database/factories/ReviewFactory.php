<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment'=>$this->faker->paragraph(),
            'user_id' =>User::all()->random()->id,
            'course_id' =>Course::all()->random()->id,
            'rating' =>$this->faker->randomElement([1,2,3,4,5,6,7,8,9])
        ];
    }
}
