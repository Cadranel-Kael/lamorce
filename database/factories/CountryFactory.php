<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            'iso3_code' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
