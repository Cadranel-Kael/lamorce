@props([
    'type' => 'button',
    'color' => 'bg-white transition-all text-black hover:bg-primary disabled:bg-gray-100 disabled:text-gray-500',
    'attributes' => '',
    ])
<button {{ $attributes->class(['button', $color]) }} type="{{ $type }}">
    {{ $slot }}
</button>
