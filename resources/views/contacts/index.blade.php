<x-app-layout>
    <x-slot name="title">
        {{ __('Contacts') }}
    </x-slot>
    <x-slot name="actions">
        <x-button
            x-data
            @click="$dispatch('openModal', {
            title: '{{ __('Create Contact') }}',
            component: 'contact.edit.form'
        })"
        >
            {{ __('Create Contact') }}
        </x-button>
    </x-slot>


    <livewire:contact.index.table lazy/>
</x-app-layout>
