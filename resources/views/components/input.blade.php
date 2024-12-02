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
<div class="flex-col flex gap-2 {{ $class }}">
    <label for="{{ $name }}">{{ $label }}@if($required)<span class="text-error-600">*</span>@endif</label>
    <input autocomplete="{{ $autocomplete }}" @if($autofocus) autofocus @endisset wire:model.blur="{{ $model }}" placeholder="{{ $placeholder }}" class="rounded border-gray-400" id="{{ $name }}" name="{{ $name }}" type="text">
    @error($model)
    <span class="text-error-600">{{ $message }}</span>
    @enderror
</div>
