<?php

namespace App\Livewire\Contact\Index;

use App\Concerns\TableMassAction;
use App\Concerns\TableSearchable;
use App\Concerns\TableSortable;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, TableSortable, TableSearchable, Deletable, TableMassAction;

    protected $sortableColumns = [
        'name' => 'name',
        'region' => 'addresses.state',
    ];

    public function deleteSelected()
    {
        foreach ($this->selectedItems as $contactId) {
            $this->deleteContact($contactId);
        }
    }

    public function delete($contactId)
    {
        $this->deleteContact($contactId);
    }

    public function render()
    {
        $query = Contact::leftJoin('addresses', 'contacts.address_id', '=', 'addresses.id');

        $query = $query->select('contacts.*');

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        $contacts = $query->paginate(10);

        $this->itemsOnPage = $contacts->map(fn($contact) => (string)$contact->id)->toArray();

        return view('livewire.contact.index.table', [
            'contacts' => $contacts,
        ]);
    }

    public function placeholder()
    {
        return view('livewire.contact.index.table-placeholder');
    }
}
