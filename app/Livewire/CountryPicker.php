<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CountryPicker extends Component
{
    public $countries;
    public $selectedCountry;
    public $search = '';

    #[Computed]
    public function countries()
    {
        $data = Country::query()
            ->whereHas('translations', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->with('translations', function ($query) {
                $query->where('language', 'en');
            })
            ->paginate(5);


        return $data->map(function ($country) {
            $country = array_merge($country->toArray(), $country->translations[0]->toArray());
            unset($country['translations']);
            return $country;
        });
    }

    public function selectCountry($country_id)
    {
        $this->selectedCountry = Country::where('id', $country_id)->with('translations')->first();
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
