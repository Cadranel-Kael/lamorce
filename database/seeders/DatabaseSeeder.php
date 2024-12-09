<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Contact;
use App\Models\Detente;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        Artisan::call('seed:countries');

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $baseCollections = CollectionType::factory()
            ->create([
                'name' => 'Base collection',
            ]);

        Collection::factory()
            ->create([
                'is_general' => 1,
                'name' => 'General collection',
                'type_id' => $baseCollections->id,
                'isClosed' => 0,
                'user_id' => $user->id,
            ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
                    ->state([
                        'user_id' => $user->id,
                    ])
                    ->count(6)
            )
            ->create([
                'name' => 'Project collection',
            ]);

        $allCollections = Collection::all();

//        foreach ($allCollections as $collection) {
//            Transaction::factory(10)->create([
//                'incoming_collection_id' => $collection->id,
//                'outgoing_collection_id' => rand(0, 1) ? $allCollections->where('id', '!=', $collection->id)->random()->id : null,
//            ]);
//
//            Transaction::factory(10)->create([
//                'outgoing_collection_id' => $collection->id,
//                'incoming_collection_id' => rand(0, 1) ? $allCollections->where('id', '!=', $collection->id)->random()->id : null,
//            ]);
//        }


        Detente::factory(10)->create();

        Account::factory(1)->create();

        Contact::factory(200)->create([
            'user_id' => 1,
        ]);
    }
}
