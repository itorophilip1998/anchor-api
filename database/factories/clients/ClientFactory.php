<?php

namespace Database\Factories\clients;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastname(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
