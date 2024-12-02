<tr {{ $attributes->merge([
    'class' => 'border-b-2 border-gray-100'
]) }}>
    {{ $slot }}
</tr>
