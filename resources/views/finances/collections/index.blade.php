<x-app-layout>
    @slot('title')
        {{ __('Finances') }}
    @endslot
    @slot('actions')
        <x-button
            x-data
            @click="$dispatch('openModal', {component: 'finances.collections.create', title: '{{ __('Create Collection') }}'})">
            {{ __('Create Collection') }}
        </x-button>
    @endslot
    @slot('subMenu')
        <li><a href="{{ route('finances.overview') }}" class="hover:underline">{{ __('Overview') }}</a></li>
        <li><a href="{{ route('finances.collections.index') }}"
               class="underline hover:underline">{{ __('Collections') }}</a></li>
    @endslot
    <div class="grid grid-cols-2 gap-7">
    @foreach($collections as $collection)
            <x-account-card
                collection="{{ $collection->name }}"
                :showStatus="true"
                is-closed="{{ $collection->isClosed }}"
                type="{{ $collection->type->name }}"
                amount="{{ $collection->amount() }}"
                desc="{{ $collection->description }}"
                x-data
                x-on:click="$dispatch(
                    'openModal', {
                        component: 'finances.collections.show',
                        expand: true,
                        data: {collection:{{ $collection->id }}},
                        title: '{{ $collection->name }}',
                        type: 'drawer',
                        'edit': {
                            component: 'finances.collections.edit',
                            title: '{{ __('Edit') . ' ' . $collection->name }}',
                            data: {collection_id:{{ json_encode($collection->id) }}}
                        }
                     }
                     )"/>
        @endforeach
    </div>
</x-app-layout>
