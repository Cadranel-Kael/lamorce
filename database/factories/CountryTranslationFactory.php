<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\CountryTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CountryTranslationFactory extends Factory
{
    protected $model = CountryTranslation::class;

    public function definition(): array
    {
        return [
            'language' => $this->faker->word(),
            'name' => $this->faker->name(),
            'flag_alt' => $this->faker->sentence(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'country_id' => Country::factory(),
        ];
    }
}
