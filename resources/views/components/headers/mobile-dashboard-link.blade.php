@props(['active', 'enable' => true])
<p class="block w-full text-center transition-all duration-300 py-2.5 text-jacarta
{{ $active ? "bg-jacarta text-white" : "" }}
{{ $enable ? "hover:text-jacarta " : "hover:bg-none text-neutral-500 cursor-not-allowed pointer-events-none"}}">
    <a {{ $attributes }} >
        {{ $slot }}
    </a>
</p>
