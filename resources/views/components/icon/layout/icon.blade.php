<svg
    {{ $attributes->merge([
        'class' => 'size-6',
        'xmlns' => 'http://www.w3.org/2000/svg',
        'fill' => 'none',
        'viewBox' => '0 0 24 24',
        'stroke-width' => '1.5',
        'stroke' => 'currentColor',
    ]) }}
>
    {{ $slot }}
</svg>
