<?php

namespace Database\Factories;

use App\Models\Company;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;


class CompanyFactory extends Factory
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

        return [
            'name' => $this->faker->company,
            'state' => $faker->state
        ];
    }
}
