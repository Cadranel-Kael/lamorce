<?php

namespace Database\Factories;

use App\Models\Mandate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MandateFactory extends Factory
{
    protected $model = Mandate::class;

    public function definition(): array
    {
        return [
            'date_time' => $this->faker->dateTimeBetween('-1 year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
