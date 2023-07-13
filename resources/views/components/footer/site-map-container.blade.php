@props(['title'])
<aside {{ $attributes->class(['w-72']) }}>
    <h6 class="font-bold mb-6">{{$title}}</h6>
    <ul class="leading-7">
        {{$slot}}
    </ul>
</aside>
