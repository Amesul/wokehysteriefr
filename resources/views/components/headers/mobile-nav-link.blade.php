@props(['active' => false])

<li class="font-luckiest-guy block w-full py-4 text-center transition-all duration-300 text-white
{{ $active ? "bg-jacarta" : "" }}">
    <a {{ $attributes }}>
        {{ $slot }}
    </a>
</li>
