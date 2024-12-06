<select
    @isset($autofocus)
        autofocus
    @endisset
    wire:model.blur="{{ $model ?? ''}} "
    class="rounded border-gray-400"
    id="{{ $name ?? '' }}"
    name="{{ $name ?? '' }}"
    {{ $attributes }}
>
    {{ $slot }}
</select>
