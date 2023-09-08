<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 65),
            'phone_number' => $this->faker->phoneNumber,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'is_student' => $this->faker->boolean,
            'salary' => $this->faker->optional(0.7, null)->randomFloat(2, 1000, 5000),
            'birthdate' => $this->faker->date,
            'notes' => $this->faker->optional(0.3)->text,
        ];
    }
}
