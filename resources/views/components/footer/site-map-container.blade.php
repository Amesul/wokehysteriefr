@props(['title'])
<aside {{ $attributes->class(['w-60  text-center sm:text-start']) }}>
    <h6 class="mb-3 font-bold sm:mb-6">{{$title}}</h6>
    <ul class="grid gap-0 leading-7 md:gap-0.5 lg:gap-1">
        {{$slot}}
    </ul>
</aside>
