@props([
    'type' => 'button',
    'color' => 'bg-primary text-black hover:bg-black hover:text-primary',
    'attributes' => '',
    ])
<button {{ $attributes->class(['button', $color]) }} type="{{ $type }}">
    {{ $slot }}
</button>
