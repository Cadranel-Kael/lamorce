@php
    $name = $name ?? explode('.', $route)[0];
    $currentSection = $currentSection ?? explode('.', request()->route()->getName())[0];
@endphp
<li class="rounded px-4 py-1 w-44 flex flex-col gap-2 hover:bg-primary {{ $currentSection === $name ? 'bg-primary' : '' }}">
    <a class="font-bold" href="{{ route($route) }}" wire:navigate>
        {{ $slot }}
    </a>
    @if(isset($linkNav) && $currentSection === $name)
        <ul class="flex-col flex gap-1">
            {{ $linkNav }}
        </ul>
    @endif
</li>
