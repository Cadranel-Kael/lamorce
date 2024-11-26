<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Detente;
use App\Models\Transaction;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
                    ->count(4)
                    ->has(Transaction::factory()->count(5))
            )
            ->create([
                'name' => 'Base collection',
            ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
                    ->count(6)
                    ->has(Transaction::factory()->count(5))
            )
            ->create([
                'name' => 'Project collection',
            ]);

        Detente::factory(10)->create();


        Account::factory(1)->create();
    }
}
