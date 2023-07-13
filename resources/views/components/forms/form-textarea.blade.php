@props(['disabled' => false,])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-blue-violet focus:ring-blue-violet rounded-md shadow-sm',
    ]) !!}>
    {{ $slot }}
</textarea>
