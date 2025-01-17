@aware(['id'])
<select id="{{ $id }}" {{ $attributes->class('bg-transparent border-none') }} >
    <option value="" >{{ __('Select') }}</option>
    {{ $slot }}
</select>
