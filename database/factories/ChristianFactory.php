<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Christian>
 */
class ChristianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'invite' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'contact'=>fake()->phoneNumber,
            'status'=>fake()->randomElement(['present',null,'present',]),
            'gender'=>fake()->randomElement(['male','female','female']),
            'province'=>fake()->randomElement(['Matebeleland North','Matebeleland South','Bulawayo','Harare','Manicaland','Mashonaland Central','Mashonaland East','Mashonaland West','Masvingo','Matebeleland North','Matabeleland South']),
            'assembly'=>fake()->randomElement([fake()->state,null]),
            'pastor' => fake()->randomElement([fake()->name,null]),
            'need_accommodation'=>fake()->randomElement(['yes','no']),
            'dob' =>  fake()->dateTimeBetween($startDate = '-50 years', $endDate = '+0 years', $timezone = null),
            
        ];
    }
}
