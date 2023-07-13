@props([
    /** @var mixed */
    'post'
])

<div {{ $attributes->class(['mt-2']) }}>
    <h2 class="text-2xl font-bold"><a href="/blog/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p class="text-xs text-neutral-500">{{ $post->created_at->diffForHumans() }}</p>
</div>
