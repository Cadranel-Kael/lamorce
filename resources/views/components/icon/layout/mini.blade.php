<svg
    {{ $attributes->merge([
            'class' => 'size-5',
            'xmlns' => 'http://www.w3.org/2000/svg',
            'fill' => 'currentColor',
            'viewBox' => '0 0 20 20',
        ]) }}
>
    {{ $slot }}
</svg>
