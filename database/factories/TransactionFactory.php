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
            'amount' => $this->faker->numberBetween(100, 50000),
            'date_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'incoming_collection_id' => Collection::factory(),
            'outgoing_collection_id' => Collection::factory(),
            'identifier' => $this->faker->uuid,
            'message' => $this->faker->sentence,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
