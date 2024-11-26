<x-app-layout>
    @slot('title')
        {{ __('Finances') }}
    @endslot
    @slot('subMenu')
        <li><a href="{{ route('finances.overview') }}" class="hover:underline">{{ __('Overview') }}</a></li>
        <li><a href="{{ route('collections.index') }}"
               class="underline hover:underline">{{ __('Collections') }}</a></li>
    @endslot
    <div class="grid grid-cols-2 gap-7">
        @foreach($collections as $collection)
            <x-account-card
                collection="{{ $collection->name }}"
                :showStatus="true"
                is-closed="{{ $collection->isClosed }}"
                type="{{ $collection->type->name }}"
                amount="{{ $collection->amount }}"
                desc="{{ $collection->description }}"
                x-data
                x-on:click="$dispatch('openModal', {component: 'finances.collections.show', data: {collection:{{ $collection->id }}}, title: '{{ $collection->name }}'})"/>
        @endforeach
    </div>
</x-app-layout>
