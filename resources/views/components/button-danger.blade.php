@props([
    'type' => 'button',
    'color' => 'bg-red-500 text-white hover:bg-red-600',
    'attributes' => '',
    ])
<button {{ $attributes->class(['button', $color]) }} type="{{ $type }}">
    {{ $slot }}
</button>
