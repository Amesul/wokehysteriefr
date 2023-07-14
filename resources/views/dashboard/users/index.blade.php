<x-dashboard-layout>
    <x-slot name="title">
        Utilisateurs
    </x-slot>

    <x-title>Users</x-title>

    <section class="mx-auto mt-10 max-w-5xl rounded-xl bg-white shadow-xl">
        <table class="w-full table-auto overflow-hidden rounded-xl text-xl">
            <thead class="h-16 bg-neutral-300 font-bold">
            <tr>
                <th class="px-6"></th>
                <th class="px-6 text-start">Nom d'utilisateur</th>
                <th class="px-6">Admin</th>
                <th class="px-6">Auteur·ice</th>
                <th class="px-6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="h-16 {{ $loop->even ? "bg-neutral-50" : "" }}">
                    <td class="px-6">
                        @if(isset($user->profile_picture) )
                            <img src="{{ url(substr_replace($user->profile_picture, 'storage', 0, 6)) }}"
                                 class="my-2 my-auto h-12 rounded-full"
                                 alt="Photo de profil de {{ $user->username }}">
                        @endif
                    </td>
                    <td class="px-6">{{ $user->username }}</td>
                    <td class="px-6">
                        <form method="post" action="/users/{{ $user->id }}/admin">
                            @method('PATCH')
                            @csrf
                            @if($user->id === auth()->user()->id || (auth()->user()->username !== 'amesul'))
                                <input onchange="this.form.submit()"
                                       class="mx-auto block h-4 w-4 cursor-not-allowed rounded accent-blue-violet checked:bg-blue-violet"
                                       type="checkbox"
                                       disabled
                                    {{ $user->admin ? 'checked' : '' }}>
                            @else
                                <input type="hidden" id="admin" name="admin" value="{{ $user->admin ? 0 : true }}">
                                <input onchange="this.form.submit()"
                                       class="mx-auto block h-4 w-4 rounded accent-blue-violet checked:bg-blue-violet"
                                       type="checkbox"
                                    {{ $user->admin ? 'checked' : '' }}>
                            @endif
                        </form>
                    </td>
                    <td class="px-6">
                        <form method="post" action="/users/{{ $user->id }}/writer">
                            @method('PATCH')
                            @csrf
                            @if($user->id === auth()->user()->id)
                                <input onchange="this.form.submit()"
                                       class="mx-auto block h-4 w-4 cursor-not-allowed rounded accent-blue-violet checked:bg-blue-violet"
                                       type="checkbox"
                                       disabled
                                    {{ $user->writer ? 'checked' : '' }}>
                            @else
                                <input type="hidden" id="writer" name="writer" value="{{ $user->writer ? 0 : true }}">
                                <input onchange="this.form.submit()"
                                       class="mx-auto block h-4 w-4 rounded accent-blue-violet checked:bg-blue-violet"
                                       type="checkbox"
                                    {{ $user->writer ? 'checked' : '' }}>
                        @endif
                        </form>
                    </td>
                    <td class="px-6 text-end">
                        @if($user->id !== auth()->user()->id && auth()->user()->username === 'amesul')
                            <form method="post" action="/users/{{ $user->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500 transition-all duration-300 hover:text-red-700">Supprimer
                                </button>
                            </form>
                        @else
                            <button class="text-red-800 transition-all duration-300 cursor-not-allowed">Supprimer
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-dashboard-layout>
