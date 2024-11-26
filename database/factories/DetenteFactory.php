<?php

namespace Database\Factories;

use App\Models\Detente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DetenteFactory extends Factory
{
    protected $model = Detente::class;

    public function definition(): array
    {
        return [
            'date_time' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
