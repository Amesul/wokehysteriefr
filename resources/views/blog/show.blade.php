<x-app-layout>
    <x-slot name="title">Blog</x-slot>
    <a class="mr-auto block text-start font-bold text-neutral-900 md:hidden" href="/blog/posts"><i
            class="fa-solid fa-circle-chevron-left"></i> Retour aux posts</a>
    <x-title>{{ $post->title }}</x-title>
    <main class="mx-auto my-10 flex flex-col gap-4 md:gap-16 md:flex-row">
        <aside class="flex max-w-xs flex-col gap-4 mt-3.5">
            <a class="mr-auto hidden text-end font-bold text-neutral-900 md:block" href="/blog/posts"><i
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
