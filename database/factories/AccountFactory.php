<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'total' => $this->faker->randomNumber(6, true),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
