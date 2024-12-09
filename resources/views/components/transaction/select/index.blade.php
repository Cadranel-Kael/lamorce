@props([
    'id',
    'label',
    'required',
])
<label class="bg-gray-100 rounded items-center flex py-1 px-2" for="{{ $id }}">
    <span class="text-gray-500">{{ $label }}</span>
    {{ $slot }}
</label>
