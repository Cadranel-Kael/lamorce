<div class="bg-white rounded px-10 py-7 shadow" id="contactTable">
    <div class="mb-5 text-2xl font-bold">My contacts</div>
    <div class="mb-5 flex justify-between">
        <div>
            <label for="search" class="sr-only">{{ __('Search name or email') }}</label>
            <div class="relative inline-flex items-center">
                <x-icon.magnifying-glass class="w-5 left-2 h-5 text-gray-400 absolute pointer-events-none"/>
                <input id="search" placeholder="{{ __('Search name or email') }}"
                       class="w-72 pl-9 rounded-lg border-gray-400" type="text">
            </div>
        </div>
        <div class="flex gap-5">
            <x-button class="flex gap-1 items-center">
                <x-icon.mini-arrow-down-tray class="size-4"/>
                Export
            </x-button>
        </div>
    </div>
    <div class="relative mb-4">
        <x-table>
            <x-table.head>
                <x-table.h-cell>
                    <x-table.cell>
                        <input class="rounded"
                               type="checkbox">
                    </x-table.cell>
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
                @foreach(range(0, 10) as $i)
                    <x-table.row>
                        <x-table.empty-cell/>
                        <x-table.empty-cell/>
                        <x-table.empty-cell/>
                        <x-table.empty-cell/>
                        <x-table.empty-cell/>
                        <x-table.empty-cell/>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table>
    </div>
{{--    {{ $contacts->links('livewire.contact.index.pagination', data: ['scrollTo' => '#contactTable']) }}--}}
</div>
