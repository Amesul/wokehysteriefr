@props([
    'disabled' => false,
    ])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'h-10 py-2 px-2 border-gray-300 focus:border-blue-violet focus:ring-blue-violet rounded-md shadow-sm border w-full',
    ]) !!}>
