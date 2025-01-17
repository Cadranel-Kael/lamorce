<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\CollectionType;
use App\Models\Contact;
use App\Models\Mandate;
use App\Models\MandateSetting;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use function MongoDB\BSON\toJSON;

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
            ]);

        CollectionType::factory()
            ->has(
                Collection::factory()
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

        MandateSetting::create([
            'meeting_type' => 'weekday',
            'weekday' => 1,
            'week_of_month' => 1,
        ]);

//        Mandate::factory(10)->create();

        Project::factory(100)->create();

        Contact::factory(100)->create();

        $mandateCount = 10;

        // Mandate 1: 9 months ago, 9 contacts how donated in the last 3 months
        // Mandate 2: 8 months ago, replace 3 last contacts with 3 new contacts
        // Mandate x: ...

        $now = Carbon::now();

        Contact::factory(50)->create([
           'months_donated' => json_encode([$now->format('Y-m'), $now->subMonth()->format('Y-m'), $now->subMonth()->format('Y-m')]),
        ]);


        $date = Carbon::now()->subMonths($mandateCount);

        $contacts = Contact::factory(9)->create([
            'months_donated' => json_encode([$date->format('Y-m'), $date->subMonth()->format('Y-m'), $date->subMonth()->format('Y-m')]),
        ]);

        Mandate::factory()->create([
            'date_time' => $date,
        ])->contacts()->attach($contacts);

        for ($i = 0; $i < $mandateCount; $i++) {
            $date = Carbon::now()->subMonths($mandateCount - $i);

            $contacts = $contacts->slice(3)->merge(
                Contact::factory(3)->create([
                    'months_donated' => json_encode([$date->format('Y-m'), $date->subMonth()->format('Y-m'), $date->subMonth()->format('Y-m')]),
                ])
            );

            Mandate::factory()->create([
                'date_time' => $date,
            ])->contacts()->attach($contacts);
        }
    }
}
