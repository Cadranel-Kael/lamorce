<?php

namespace Database\Seeders;

use App\Console\Commands\SeedCountries;
use App\Models\Account;
use App\Models\Address;
use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CountryTranslation;
use App\Models\Detente;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        Artisan::call('seed:countries');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
                    ->count(4)
                    ->has(Transaction::factory()->count(20))
            )
            ->create([
                'name' => 'Base collection',
            ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
                    ->count(6)
                    ->has(Transaction::factory()->count(20))
            )
            ->create([
                'name' => 'Project collection',
            ]);


        Detente::factory(10)->create();

        Account::factory(1)->create();

        Contact::factory(200)->create([
            'user_id' => 1,
        ]);
    }
}
