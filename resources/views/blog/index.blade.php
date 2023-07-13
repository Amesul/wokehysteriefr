<x-app-layout>
    <x-slot name="title">Blog</x-slot>
    <x-title>
        Blog
        @if(isset($filter))
            <x-slot:filter>/ {{ $filter }}</x-slot:filter>
        @endif
    </x-title>

    <main class="mx-auto my-4 grid max-w-5xl grid-cols-2 gap-4">
        @foreach($posts as $post)
            <x-posts.post-card :post="$post"/>
        @endforeach
    </main>

</x-app-layout>
