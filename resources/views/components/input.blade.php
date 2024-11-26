@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'required' => false,
    'class' => '',
    'placeholder' => '',
    'model' => '',
    'autocomplete' => 'off',
    'autofocus' => false,
])
<div class="flex-col flex gap-4 {{ $class }}">
    <label for="{{ $name }}">{{ $label }}@if($required)<span class="text-error-600">*</span>@endif</label>
    <input autocomplete="{{ $autocomplete }}" {{ $autofocus ? 'autofocus' : ''}} wire:model.blur="{{ $model }}" placeholder="{{ $placeholder }}" class="rounded border-gray-400" id="{{ $name }}" name="{{ $name }}" type="text">
    @error($model)
    <span class="text-error-600">{{ $message }}</span>
    @enderror
</div>
