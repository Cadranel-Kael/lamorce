<nav class="bg-white shadow py-5 px-8">
    <div class="max-w-7xl flex items-center gap-4">
        <h2 class="sr-only">{{ __('Navigation') }}</h2>
        <input type="text" class="border-none rounded w-full" placeholder="{{ __('Search') }}...">
        <div
            x-data="{ open: false }"
            x-on:keydown.escape="open = false"
            x-on:click.away="open = false"
            class="relative min-w-fit">
            <button @click="open = !open" >{{ $user->name }}</button>
            <ul x-show="open" class="z-10 absolute shadow right-0 p-4 flex flex-col gap-2 top-full bg-white rounded">
                <li><a href="#" class="block hover:bg-gray-100 rounded p-1">{{ __('Profile') }}</a></li>
                <li><button wire:click="logout" class="block hover:bg-gray-100 rounded p-1">{{ __('Log Out') }}</button></li>
            </ul>
        </div>
    </div>
</nav>
