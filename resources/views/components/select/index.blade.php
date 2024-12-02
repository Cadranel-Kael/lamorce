@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'required' => false,
    'class' => '',
    'model' => '' ?? $name,
    'autofocus' => false,
    'options' => [],
])
<div class="flex flex-col gap-2" {{ $attributes }}>
    <label for="{{ $name }}">
        {{ $label }}
        @if($required)
            <span class="text-error-600">*</span>
        @endif
    </label>
    {{ $slot }}
    @error($model)
    <span class="text-error-600">{{ $message }}</span>
    @enderror
</div>
