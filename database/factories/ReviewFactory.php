<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\User;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->sentence(10),
            'property_id'=>Property::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id,
            //
        ];
    }
}
