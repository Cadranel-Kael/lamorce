<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\CountryTranslation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SeedCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch countries from RestCountries API and seed into the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $localFile = storage_path('app/countries_by_continent.json');
        $regions = ['Africa', 'Europe', 'Americas', 'Asia', 'Oceania'];
        $countriesData = [];

        if (file_exists($localFile)) {
            $this->info('Loading countries from local file...');
            $countriesData = json_decode(file_get_contents($localFile), true);
        } else {
            $this->info('Fetching countries from RestCountries API...');

            foreach ($regions as $region) {
                $response = Http::get("https://restcountries.com/v3.1/region/$region?fields=name,cca2,flags");

                if ($response->failed()) {
                    $this->error("Failed to fetch countries for $region. Status code: " . $response->status());
                    continue;
                }

                foreach ($response->json() as $country) {
                    $countriesData[] = [
                        'region' => $region,
                        'code' => $country['cca2'],
                        'flag_url' => $country['flags']['svg'],
                        'name' => $country['name']['common'],
                        'flag_alt' => $country['flags']['alt'] ?? '',
                    ];
                }
            }

            file_put_contents($localFile, json_encode($countriesData));
            $this->info('Countries saved locally for future use.');
        }

        $this->info('Seeding countries into the database...');
        foreach ($countriesData as $data) {

            $countryModel = Country::updateOrCreate([
                'code' => $data['code'],
                'flag_url' => $data['flag_url'],
            ]);

            CountryTranslation::updateOrCreate([
                'country_id' => $countryModel->id,
                'language' => 'en',
                'name' => $data['name'],
                'flag_alt' => $data['flag_alt'],
            ]);
        }

        $this->info('Countries seeded successfully!');
    }
}
