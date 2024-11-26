<li class="rounded px-4 py-1 {{ request()->routeIs($route) ? 'bg-primary' : '' }}">
    <a class="font-bold" href="{{ route($route) }}" wire:navigate>
        {{ $slot }}
    </a>
    <ul>
        @yield('link-nav')
    </ul>
</li>
