@props([
    /** @var mixed */
    'post'
])

<div {{ $attributes->class(['flex']) }}>
    @if($post->author->profile_picture)
        <img src="{{ url(substr_replace($post->author->profile_picture, 'storage', 0, 6))}}"
             class="w-14 rounded-full" alt="Photo de profil de {{ $post->author->username }}">
    @endif
    <div class="{{ isset($post->author->profile_picture) ? "mx-3" : ""}} my-auto">
        <h3 class="font-bold text-blue-violet"><a
                    href="/blog/authors/{{ $post->author->username }}">{{ $post->author->display_name }}</a></h3>
        @if(isset($post->author->job))
            <p class="text-xs text-neutral-500">{{ $post->author->job }}</p>
        @endif
    </div>
</div>
