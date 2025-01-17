<svg
    {{ $attributes->merge([
        'class' => 'size-4',
        'xmlns' => 'http://www.w3.org/2000/svg',
        'viewBox' => '0 0 16 16',
        'fill' => 'currentColor',
    ]) }}
>
    {{ $slot }}
</svg>
