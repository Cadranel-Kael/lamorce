<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\CollectionType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CollectionFactory extends Factory
{
    protected $model = Collection::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'amount' => $this->faker->randomNumber(5, false),
            'description' => $this->faker->text(),
            'isClosed' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'type_id' => CollectionType::factory(),
        ];
    }
}
