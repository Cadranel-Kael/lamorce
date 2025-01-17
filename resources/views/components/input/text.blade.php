@aware([
    'error',
    'id',
])

@props([
    'autocomplete' => 'off'
])

<input
    {{ $attributes->class([
    'rounded border-gray-400',
    'border-red-600' => $error
]) }}
    class="rounded border-gray-400"
    type="text"
    @if($autocomplete === 'off')
        data-1p-ignore
    @endif
    id="{{ $id }}"
    value="{{ $slot }}"
>
