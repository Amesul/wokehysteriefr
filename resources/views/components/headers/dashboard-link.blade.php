@props(['active', 'enable' => true])
<p class="block h-full transition-all duration-300 px-6 w-fit py-2.5
{{ $active ? "bg-jacarta text-white" : "" }}
{{ $enable ? "hover:bg-blue-violet hover:text-white " : "hover:bg-none text-neutral-500 cursor-not-allowed pointer-events-none"}}">
    <a {{ $attributes }} >
        {{ $slot }}
    </a>
</p>
