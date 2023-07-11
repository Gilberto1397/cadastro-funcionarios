<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\pt_BR\Address($faker));
        $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

        return [
            'name' => $faker->name,
            'age' => $this->faker->randomNumber(2),
            'companies_id' => $this->faker->numberBetween(1, 15),
            'state' => $faker->state
        ];
    }
}
