<x-app-layout>
    <x-slot name="title">Blog</x-slot>
    <x-title>{{ $post->title }}</x-title>
    <main class="mx-auto my-10 flex max-w-5xl gap-16">
        <aside class="flex max-w-xs flex-col gap-4 mt-3.5">
            <a class="text-neutral-900 text-end block mr-auto font-bold" href="/blog/posts"><i
                    class="fa-solid fa-circle-chevron-left"></i> Retour aux posts</a>
            <div class="flex flex-wrap justify-start gap-2">
                @foreach($tags = $post->tags as $tag)
                    <x-posts.card.tag-button :tag="$tag">{{ $tag->name }}</x-posts.card.tag-button>
                @endforeach
            </div>
            <x-posts.card.author :post="$post"/>
        </aside>

        <article class="flex-1 flex-col post-body">
            {!! $post->body !!}
        </article>
    </main>
</x-app-layout>
