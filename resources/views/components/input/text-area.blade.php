@aware([
    'error',
    'id',
])

@props([
    'autocomplete' => 'off'
])

<textarea
        {{ $attributes->class([
        'rounded border-gray-400 overflow-hidden resize-none',
        'border-red-600' => $error
    ]) }}
            rows="1"
        @if($autocomplete === 'off')
            data-1p-ignore
        @endif
        x-data="{ resize: () => { $el.style.height = '10px'; $el.style.height = $el.scrollHeight + 'px' } }"
        x-init="resize()"
        @input="resize()"
        id="{{ $id }}"
>{{ $slot }}</textarea>
