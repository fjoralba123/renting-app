<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\User;
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->text(20),
            'description'=>$this->faker->sentence(10),
            'address'=>$this->faker->address,
            'price'=>$this->faker->randomFloat(2,50,1000),
            'type'=>$this->faker->text(10),
            'area'=>$this->faker->randomFloat(2,50,1000),
            'image'=>$this->faker->randomElement($array = array ("uploads/ZZIyRmZlBeYBE0d0hDAk0tODNyqfOyaYJlg45ACz.jpg","uploads/2bZThO8SaKF8OPvftShYoIoIbkt5OSKeDgE42vkw.jpg","upload/uIhFdHFlV3cgJq6Mhfg6VBKY7wpwWMPdF8RA0KN5.jpg"))
            ,
            'user_id'=> User::inRandomOrder()->first()->id,
            'startDate'=>$this->faker->date($format = 'Y-m-d'),
            'endDate'=>$this->faker->date($format = 'Y-m-d')

            //
        ];
    }
}
