<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CountryPicker extends Component
{
    public $countries;

    #[Reactive]
    public $selectedCountry;

    public $search = '';

    #[Computed]
    public function countries()
    {
        $data = Country::query()
            ->join('country_translations', 'countries.id', '=', 'country_translations.country_id')
            ->where('country_translations.language', 'en')
            ->where('country_translations.name', 'like', '%' . $this->search . '%')
            ->orderBy('country_translations.name')
            ->paginate(5);


        return $data->map(function ($country) {
            $country = array_merge($country->toArray(), $country->translations[0]->toArray());
            unset($country['translations']);
            return $country;
        });
    }

    public function mount()
    {
        $this->countries = $this->countries();
    }

    public function render()
    {
        return view('livewire.country-picker');
    }
}
