<div>
    <label for="search" class="sr-only">{{ __('Search name or email') }}</label>
    <div class="relative inline-flex items-center">
        <x-icon.magnifying-glass class="w-5 left-2 h-5 text-gray-400 absolute pointer-events-none"/>
        <input id="search" placeholder="{{ __('Search name or email') }}"
               class="w-72 pl-9 rounded-lg border-gray-400" wire:model.live.debounce.250ms="search" type="text">
    </div>
</div>
