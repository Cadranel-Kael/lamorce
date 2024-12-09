@aware(['id'])
<select id="{{ $id }}" class="bg-transparent border-none">
    <option value="" disabled>{{ __('Select') }}</option>
    {{ $slot }}
</select>
