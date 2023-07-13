@props([
    'disabled' => false,
    ])

<input {{ $disabled ? 'disabled' : '' }} type="file" {!! $attributes->merge([
    'class' => 'h-10 focus:ring-blue-violet rounded-md mt-1 block w-full file:mr-4 file:py-2 file:px-4 focus:outline-none file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-200 file:cursor-pointer shadow-none text-xs file:text-blue-violet',
    ]) !!}>
