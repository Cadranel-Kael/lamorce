<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'amount' => $this->faker->randomNumber(4),
            'date_time' => $this->faker->dateTime(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'collection_id' => Collection::factory(),
        ];
    }
}
