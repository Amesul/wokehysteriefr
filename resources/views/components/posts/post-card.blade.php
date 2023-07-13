@props([
    /** @var mixed */
    'post'
])

<section {{ $attributes->class(['flex flex-col rounded-2xl px-5 hover:bg-maize/[.2]']) }}>
    <article class="my-6 flex flex-1 flex-col justify-between">
        <header>
            <div class="flex justify-end gap-2">
                @foreach($tags = $post->tags as $tag)
                    @if($loop->index < 2)
                        <x-posts.card.tag-button :tag="$tag">{{ $tag->name }}</x-posts.card.tag-button>
                    @elseif($loop->remaining === 0)
                        <x-posts.card.tag-button :tag="$tag">{{ $tag->name }}</x-posts.card.tag-button>
                    @else
                        <x-posts.card.tag-button>
                            + {{ $loop->remaining + 1 }}</x-posts.card.tag-button>
                        @break
                    @endif
                @endforeach
            </div>
            <x-posts.card.title :post="$post"/>
        </header>
        <div class="my-4 text-lg excerpt">
            {{ $post->excerpt }}
        </div>
        <footer class="flex w-full flex-col justify-between gap-4 sm:flex-row">
            <x-posts.card.author :post="$post" class="mx-auto sm:mx-0"/>
            <a href="/blog/posts/{{ $post->slug }}"
               class="mx-auto my-auto block h-fit w-fit rounded-full px-6 py-2 text-base text-white sm:mx-0 bg-blue-violet hover:bg-bright-lavender">
                Lire la suite <i class="pl-2 fa-solid fa-book"></i>
            </a>
        </footer>
    </article>
</section>
