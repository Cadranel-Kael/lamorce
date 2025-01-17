<?php

namespace Database\Factories;

use App\Models\MandateSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MandateSettingFactory extends Factory
{
    protected $model = MandateSetting::class;

    public function definition(): array
    {
        return [
            'meeting_type' => $this->faker->randomElement(['weekday', 'date']),
            'weekday' => null,
            'week_of_month' => null,
            'specific_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
