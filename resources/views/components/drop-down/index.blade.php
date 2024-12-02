<div
    x-data="{ open: false }"
    x-on:keydown.escape="open = false"
    x-on:click.away="open = false"
    class="relative min-w-fit"
>
    {{ $slot }}
</div>
