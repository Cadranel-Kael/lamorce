@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'required' => false,
    'class' => '',
    'placeholder' => '',
    'model' => '' ?? $name,
    'autocomplete' => 'off',
    'autofocus' => false,
    'options' => [],
])
<div class="flex flex-col gap-4">
    <label for="{{ $name }}">{{ $label }}@if($required)<span class="text-error-600">*</span>@endif</label>
    <select autocomplete="{{ $autocomplete }}" {{ $autofocus ? 'autofocus' : ''}} wire:model.blur="{{ $model }}" placeholder="{{ $placeholder }}" class="rounded border-gray-400" id="{{ $name }}" name="{{ $name }}">
        @foreach($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
    @error($model)
    <span class="text-error-600">{{ $message }}</span>
    @enderror
</div>
