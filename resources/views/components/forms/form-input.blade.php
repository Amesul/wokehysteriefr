@props([
    'disabled' => false,
    ])

<input {{ $disabled ? 'disabled' : '' }} type="text" {!! $attributes->merge([
    'class' => 'h-10 border-gray-300 focus:border-blue-violet focus:ring-blue-violet rounded-md shadow-sm',
    ]) !!}>
