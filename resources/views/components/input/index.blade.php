@props([
    'label',
    'id',
    'error',
    'required'
])

<label
    {{ $attributes->merge(['class' => 'flex-col flex gap-2 w-full']) }}
    for="{{ $id }}"
>
    <span>
        {{ $label ?? '' }}
        @isset($required)
            <span class="text-error-600">*</span>
        @endisset
    </span>
    {{ $slot }}
    @isset($error)
        <div class="text-red-600">{{ $error }}</div>
    @endif
</label>
