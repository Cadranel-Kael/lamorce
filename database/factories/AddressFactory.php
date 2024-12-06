<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'country_id' => Country::inRandomOrder()->first()->id,
            'postal_code' => $this->faker->postcode(),
            'street_name' => $this->faker->streetName(),
            'street_number' => $this->faker->buildingNumber(),
            'floor' => $this->faker->randomElement([null, $this->faker->randomNumber(2, false)]),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
