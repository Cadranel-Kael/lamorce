<?php

namespace App\Livewire\Contact\Edit;

use App\Livewire\Forms\AddressForm;
use App\Livewire\Forms\ContactForm;
use App\Models\Country;
use App\Models\CountryTranslation;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    public ContactForm $form;
    public AddressForm $addressForm;

    public $hasAddress;

    public $country;

    public $country_id;

    public function selectCountry($country_id)
    {
        $this->country_id = $country_id;
    }

    public function save()
    {
        $this->form->validate();

        if ($this->hasAddress) {
            $this->addressForm->country_id = $this->country_id;
            $this->addressForm->validate();
            $this->form->address_id = $this->addressForm->store()->id;
        }

        $this->form->store();

        return redirect()->route('contacts.index');
    }

    #[Computed]
    public function country()
    {
        if (!$this->country_id) {
            return null;
        }
        return Country::where('id', $this->country_id)->with('translations')->first();
    }

    public function render()
    {
        return view('livewire.contact.edit.form');
    }
}
