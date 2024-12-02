<x-app-layout>
    @slot('title')
        {{ __('Finances') }}
    @endslot
    @slot('subMenu')
        <li><a href="{{ route('finances.overview') }}" class="underline hover:underline">{{ __('Overview') }}</a></li>
        <li><a href="{{ route('finances.collections.index') }}"
               class="hover:underline">{{ __('Collections') }}</a></li>
    @endslot
    <livewire:collection-overview :collection="__('Total')" :total="$total" :collections-total="$collectionsTotal"/>
    <div class="mt-10 flex gap-10 flex-col">
        @foreach($collectionTypes as $type)
            <div class="flex flex-col gap-7">
                <div class="flex items-center">
                    <h2 class="text-4xl mr-6">{{ $type->name }}</h2>
                    <x-button-primary
                        x-data
                        x-on:click="$dispatch('openModal', {component: 'collection-create', data: {type:{{ $type->id }}}})">
                        {{ __('New collection') }}
                    </x-button-primary>
                </div>
                <div x-data x-sort class="flex gap-6 overflow-x-auto max-w-full">
                    @foreach($type->collections as $collection)
                        <x-account-card key="accounts" :collection="$collection->name" :amount="$collection->amount"
                                        :link="route('finances.collections.show', $collection->id)"/>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
