@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'required' => false,
    'placeholder' => '',
    'model' => '',
])
<div class="flex items-end gap-4">
    <x-input model="{{ $model }}" :placeholder="$placeholder" :label="$label" :name="$name" :required="$required" type="text" class="flex-grow"/> <span class="text-xl">€</span>
</div>
