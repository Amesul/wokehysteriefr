@props(['after' => true])

<li class="font-luckiest-guy {{ $after ? "after:content-['|'] xl:after:mx-10 after:mx-4" : '' }} ">
    <a class="transition-all duration-300 hover:text-jacarta" {{ $attributes }}>
        {{ $slot }}
    </a>
</li>
