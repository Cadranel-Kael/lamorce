<div class="bg-white rounded px-10 py-7 shadow" id="contactTable">
    <div class="mb-5 text-2xl font-bold">My projects</div>
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
                    {{ __('Description') }}
                </x-table.h-cell>
                <x-table.h-cell>
                    <x-sortable column="status" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        {{ __('Status') }}
                    </x-sortable>
                </x-table.h-cell>
                <x-table.h-cell>
                    <span class="sr-only">
                    {{ __('Actions') }}
                    </span>
                </x-table.h-cell>
            </x-table.head>
            <x-table.body>
                @foreach($projects as $project)
                    <x-table.row wire:key="{{ $project->id }}">
                        <x-table.cell>
                            <input wire:model="selectedItems" value="{{ $project->id }}" class="rounded" type="checkbox">
                        </x-table.cell>
                        <x-table.cell>
                            {{ $project->name }}
                        </x-table.cell>
                        <x-table.cell>
                            {!! truncate($project->description, 50) !!}
                        </x-table.cell>
                        <x-table.cell class="flex gap-1 items-center">
                            <div class="w-1 h-1 rounded-full bg-{{ $project->status->color() }}"></div>
                            {{ $project->status }}
                        </x-table.cell>
                        <x-table.cell>
                            <x-drop-down>
                                <x-drop-down.button>
                                    <x-icon.ellipss-horizontal class="text-gray-400 hover:text-black"/>
                                </x-drop-down.button>
                                <x-drop-down.items>
                                    <x-drop-down.item>
                                        <a href="{{ route('projects.edit', $project) }}">{{ __('Edit') }}</a>
                                    </x-drop-down.item>
                                    <x-drop-down.item>
                                        <button
                                            wire:confirm="{{ __('Are you sure you want to delete this project?') }}"
                                            wire:click="delete({{ $project->id }})"
                                            class="text-red-600"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </x-drop-down.item>
                                </x-drop-down.items>
                            </x-drop-down>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table>
    </div>
{{--    {{ $contacts->links('livewire.contact.index.pagination', data: ['scrollTo' => '#contactTable']) }}--}}
</div>

