<div class="bg-white rounded px-10 py-7 shadow" id="contactTable">
    <div class="mb-5 text-2xl font-bold">My contacts</div>
    <div class="mb-5 flex justify-between">
        <x-contact.index.search/>
        <x-contact.index.bulk-actions/>
    </div>
    <div class="relative mb-4">
        <div wire:loading
             class="bg-white absolute inset-0 rounded flex items-center justify-center opacity-50">
        </div>
        <x-table>
            <x-table.head>
                <x-table.h-cell>
                    <x-contact.index.check-all/>
                </x-table.h-cell>
                <x-table.h-cell>
                    <x-sortable column="name" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        {{ __('Name') }}
                    </x-sortable>
                </x-table.h-cell>
                <x-table.h-cell>
                    {{ __('Email') }}
                </x-table.h-cell>
                <x-table.h-cell>Phone</x-table.h-cell>
                <x-table.h-cell>
                    <x-sortable column="country" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        {{ __('Country') }}
                    </x-sortable>
                </x-table.h-cell>
                <x-table.h-cell>
                    <span class="sr-only">
                        {{ __('Actions') }}
                    </span>
                </x-table.h-cell>
            </x-table.head>
            <x-table.body>
                @foreach($contacts as $contact)
                    <x-table.row wire:key="{{ $contact->id }}">
                        <x-table.cell>
                            <input wire:model="selectedContactIds" value="{{ $contact->id }}" class="rounded" type="checkbox">
                        </x-table.cell>
                        <x-table.cell>
                            {{ $contact->name }}
                        </x-table.cell>
                        <x-table.cell>{{ $contact->email }}</x-table.cell>
                        <x-table.cell>{{ $contact->phone }}</x-table.cell>
                        <x-table.cell>{{ $contact->address->country }}</x-table.cell>
                        <x-table.cell>
                            <x-contact.index.drop-down :contact="$contact"/>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table>
    </div>
    {{ $contacts->links('livewire.contact.index.pagination', data: ['scrollTo' => '#contactTable']) }}
</div>
