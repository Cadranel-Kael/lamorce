<div>
    <x-table>
        <x-table.head>
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
        </x-table.head>
        <x-table.body>
            @foreach($projects as $project)
                <x-table.row wire:key="{{ $project->id }}">
                    <x-table.cell>
                        {{ $project->name }}
                    </x-table.cell>
                    <x-table.cell>
                        {!! truncate($project->description, 50) !!}
                    </x-table.cell>
                    <x-table.cell class="flex gap-1 items-center justify-start">
                        <div class="w-1 h-1 rounded-full bg-{{ $project->status->color() }}"></div>
                        {{ $project->status }}
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table>
</div>
