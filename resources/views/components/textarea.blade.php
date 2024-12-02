@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'required' => false,
    'class' => '',
    'placeholder' => '',
    'model' => '' ?? $name,
])
<div class="flex-col flex gap-2 {{ $class }}">
    <label for="{{ $name }}">{{ $label }}@if($required)<span class="text-error-600">*</span>@endif</label>
    <textarea
        x-data="{ resize: () => { $el.style.height = '5px'; $el.style.height = $el.scrollHeight + 'px' } }"
        x-init="resize()"
        @input="resize()"
        wire:model="{{ $model }}" placeholder="{{ $placeholder }}" class="rounded border-gray-400" id="{{ $name }}" name="{{ $name }}"></textarea>
    @error($model)
        <p class="text-error-600">{{ $message }}</p>
    @enderror
</div>
