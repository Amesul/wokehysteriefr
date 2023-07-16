<x-dashboard-layout>
    <x-slot name="title">
        Posts
    </x-slot>

    <x-title>Posts</x-title>
    <x-create-element href="/dashboard/posts/create" class="mt-8 sm:mt-12 lg:mt-16">Créer un post</x-create-element>
    <section class="mx-auto rounded-xl bg-white shadow-xl mt-8">
        <table class="w-full table-auto overflow-hidden rounded-xl hidden md:block">
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

        @foreach($posts as $post)
            <table
                class="w-full table-auto overflow-hidden text-start md:hidden {{ $loop->even ? "bg-neutral-50" : "" }}">
                <thead>
                <tr>
                    <th colspan="3" class="px-4 py-2 text-start">
                        {{ $post->title }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="pl-4"><div class="p-1.5 w-1 h-1 rounded-full mb-1 {{ $post->published ? 'bg-green-300' : 'bg-orange-300'}}"></div></td>
                    <td class="px-4">
                        <a href="/dashboard/posts/{{ $post->slug }}"
                           class="text-blue-500 transition-all duration-300 hover:text-blue-700">Modifier </a>
                    </td>
                    <td class="px-4">
                        <form method="post" action="/blog/posts/{{ $post->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="text-red-500 transition-all duration-300 hover:text-red-700">Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        @endforeach
    </section>
</x-dashboard-layout>
