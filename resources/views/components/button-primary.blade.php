<x-button {{ $attributes->class(['button', 'primary']) }} type="{{ $type ?? '' }}">
    {{ $slot }}
</x-button>
