<?php

namespace App\Livewire\Contact\Index;

use App\Models\Contact;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, Sortable, Searchable, Deletable;

    public $selectedContactIds = [];

    public $contactIdsOnPage = [];

    public function deleteSelected()
    {
        foreach ($this->selectedContactIds as $contactId) {
            $this->deleteContact($contactId);
        }
    }

    public function delete($contactId)
    {
        $this->deleteContact($contactId);
    }

    public function render()
    {
        $query = auth()->user()->contacts()->join('addresses', 'contacts.address_id', '=', 'addresses.id');

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        $contacts = $query->paginate(10);

        $this->contactIdsOnPage = $contacts->map(fn ($contact) => (string) $contact->id)->toArray();

        return view('livewire.contact.index.table', [
            'contacts' => $contacts,
        ]);
    }

    public function placeholder()
    {
        return view('livewire.contact.index.table-placeholder');
    }
}
