<x-drop-down>
    <x-drop-down.button>
        <x-icon.ellipss-horizontal class="text-gray-400 hover:text-black"/>
    </x-drop-down.button>
    <x-drop-down.items>
        <x-drop-down.item>
            <a href="{{ route('contacts.edit', $contact) }}">{{ __('Edit') }}</a>
        </x-drop-down.item>
        <x-drop-down.item>
            <button
                wire:confirm="{{ __('Are you sure you want to delete this contact?') }}"
                wire:click="delete({{ $contact->id }})"
                class="text-red-600"
            >
                {{ __('Delete') }}
            </button>
        </x-drop-down.item>
    </x-drop-down.items>
</x-drop-down>
