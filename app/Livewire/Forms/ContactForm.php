<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate(['required'])]
    public $first_name;

    #[Validate(['required'])]
    public $last_name;

    #[Validate(['nullable', 'email', 'max:254'])]
    public $email;

    #[Validate(['nullable'])]
    public $phone;

    #[Validate(['nullable'])]
    public $bank_account;

    #[Validate(['nullable', 'integer'])]
    public $address_id;

    public function store()
    {
        $this->validate();

        auth()->user()->contacts()->create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'bank_account' => $this->bank_account,
            'address_id' => $this->address_id,
        ]);
    }
}
