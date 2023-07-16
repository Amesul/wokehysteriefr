@props([
    'value',
    'required' => false
    ])

<label {{ $attributes->merge(['class' => 'block font-bold text-md text-gray-700']) }}>
    <p class="{{ $required ? "after:content-['*'] after:ml-1 after:text-red-500" : "" }}">{{ $value ?? $slot }}</p>
</label>
