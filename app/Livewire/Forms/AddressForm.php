<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddressForm extends Form
{
    #[Validate(['required'])]
    public $country_id;

    #[Validate(['required'])]
    public $postal_code;

    #[Validate(['required'])]
    public $street_name;

    #[Validate(['required'])]
    public $street_number;

    #[Validate(['nullable'])]
    public $floor;

    #[Validate(['required'])]
    public $city;

    #[Validate(['required'])]
    public $state;

    public function store()
    {
        $this->validate();

        return Address::create([
            'country_id' => $this->country_id,
            'postal_code' => $this->postal_code,
            'street_name' => $this->street_name,
            'street_number' => $this->street_number,
            'floor' => $this->floor,
            'city' => $this->city,
            'state' => $this->state,
        ]);
    }
}
