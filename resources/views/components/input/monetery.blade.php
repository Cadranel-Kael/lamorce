@aware([
    'error',
    'id',
])

@props([
    'autocomplete' => 'off'
])
<div class="flex gap-4">
<input
    {{ $attributes->class([
    'rounded border-gray-400 flex-grow',
    'border-red-600' => $error
]) }}
    class="rounded border-gray-400"
    type="text"
    @if($autocomplete === 'off')
        data-1p-ignore
    @endif
    id="{{ $id }}"
/>
    <span class="text-xl">€</span>
</div>
