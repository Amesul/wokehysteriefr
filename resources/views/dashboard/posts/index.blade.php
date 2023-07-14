<x-dashboard-layout>
    <x-slot name="title">
        Posts
    </x-slot>

    <x-title>Posts</x-title>
    <x-create-element href="/dashboard/posts/create">Créer un post</x-create-element>
    <section class="mx-auto mt-4 max-w-5xl rounded-xl bg-white shadow-xl">
        <table class="w-full table-auto overflow-hidden rounded-xl text-xl">
            <tbody>
            @foreach($posts as $post)
                <tr class="h-16 {{ $loop->even ? "bg-neutral-50" : "" }}">
                    <td class="px-6">{{ $post->title }}</td>
                    <td class="px-6">
                        <p class="py-1 px-4 text-sm text-center rounded-full {{ $post->published ? 'bg-green-300' : 'bg-orange-300'}}">{{ $post->published ? 'Publié' : 'Brouillon' }}</p>
                    </td>
                    <td class="px-6 text-end">
                        <a href="/dashboard/posts/{{ $post->slug }}"
                           class="text-blue-500 transition-all duration-300 hover:text-blue-700">Modifier </a>
                    </td>
                    <td class="px-6 text-end">
                        <form method="post" action="/blog/posts/{{ $post->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="text-red-500 transition-all duration-300 hover:text-red-700">Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-dashboard-layout>
