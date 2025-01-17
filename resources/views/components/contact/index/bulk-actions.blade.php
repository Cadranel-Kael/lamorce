<div class="flex gap-5">
    <div
        x-cloak
        x-show="$wire.selectedContactIds.length > 0"
        class="flex items-center gap-1 divide-x-2 divide-gray-100"
    >
        <div>
            <span x-text="$wire.selectedContactIds.length"></span>
            <span>{{ __('selected') }}</span>
        </div>
        <form
            class="pl-1"
            wire:submit="deleteSelected"
            wire:confirm="{{ __('Are you sure you want to delete the selected contacts?') }}"
        >
            <x-button-danger type="submit" >Delete</x-button-danger>
        </form>
    </div>
    <x-button class="flex gap-1 items-center">
        <x-icon.mini.arrow-down-tray class="size-4"/>
        Export
    </x-button>
</div>
