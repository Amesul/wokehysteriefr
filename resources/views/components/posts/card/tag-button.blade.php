@props([
    /** @var mixed */
    'tag'
])

<a {{ $attributes->class(['rounded-full border px-2 py-1 text-xs border-blue-violet']) }}
   href='{{ isset($tag) ? "/blog/tags/{$tag->slug}"   : "#" }}'
>
    {{ ucwords($slot) }}
</a>
