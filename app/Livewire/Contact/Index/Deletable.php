<?php

namespace App\Livewire\Contact\Index;

use App\Models\Contact;

trait Deletable
{
    protected function deleteContact($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->delete();
    }
}
