<nav class="z-10 fixed w-screen bg-white shadow py-5 px-8">
    <div class="ml-72 max-w-6xl justify-between flex items-center gap-4">
        <h2 class="sr-only">{{ __('Navigation') }}</h2>
        <div class="flex justify-center relative items-center">
            <x-icon.magnifying-glass class="text-gray-400 absolute left-0 size-5"/>
            <input type="text" class="border-none rounded w-full h-full pl-8" placeholder="{{ __('Search') }}...">
        </div>
        <x-drop-down>
            <x-drop-down.button>
                {{ $user->name }}
            </x-drop-down.button>
            <x-drop-down.items>
                <x-drop-down.item>
                    <a href="#">{{ __('Profile') }}</a>
                </x-drop-down.item>
                <x-drop-down.item>
                    <button wire:click="logout">{{ __('Log Out') }}</button>
                </x-drop-down.item>
            </x-drop-down.items>
        </x-drop-down>
    </div>
</nav>
