<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'country' => $this->faker->country(),
            'postal_code' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'contact_id' => Contact::factory(),
        ];
    }
}
