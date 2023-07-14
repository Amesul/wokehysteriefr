<x-dashboard-layout>
    <x-slot name="title">Edition</x-slot>
    <x-title>Edition</x-title>

    <main class="mx-auto max-w-5xl">
        <h2 class="mt-16 text-end text-3xl font-bold">Dernier épisode</h2>
        <section class="mx-auto p-10 mt-4 max-w-5xl rounded-xl bg-white shadow-x">
            <form action="/dashboard/edit/episode" method="post">
                @csrf
                {{-- Number --}}
                <fieldset class="mb-5 grid grid-cols-6 gap-4">
                    <div>
                        <x-forms.input-label for="number" required="true">Numéro</x-forms.input-label>
                        <x-forms.form-input class="mt-2" type="number" id="number"
                                            name="number"
                                            value="{{ old('number', $episode?->number) }}"></x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('number')"/>
                    </div>

                    {{-- Title --}}
                    <div class="col-span-5">
                        <x-forms.input-label for="title" required="true">Titre</x-forms.input-label>
                        <x-forms.form-input class="mt-2" id="title"
                                            name="title"
                                            value="{{ old('number', $episode?->title) }}"></x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('title')"/>
                    </div>

                    {{-- Guest --}}
                    <div class="col-span-6">
                        <x-forms.input-label for="guest" required="true">Invité·e</x-forms.input-label>
                        <x-forms.form-input class="mt-2" id="guest"
                                            name="guest"
                                            value="{{ old('number', $episode?->guest) }}"></x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('guest')"/>
                    </div>

                    {{-- Link --}}
                    <div class="col-span-6">
                        <x-forms.input-label for="link" required="true">Lien</x-forms.input-label>
                        <x-forms.form-input class="mt-2" type="url" id="link"
                                            name="link"
                                            value="{{ old('number', $episode?->link) }}"></x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('link')"/>
                    </div>
                </fieldset>
                <x-forms.primary-button class="ml-auto">Enregistrer</x-forms.primary-button>
            </form>
        </section>

        <h2 class="mt-16 text-end text-3xl font-bold">FAQ</h2>
        <x-create-element href="/dashboard/edit/faq/create">Ajouter une question</x-create-element>
        <section class="mx-auto mt-4 max-w-5xl rounded-xl bg-white shadow-x">
            <table class="w-full table-auto overflow-hidden rounded-xl text-xl">
                @foreach($questions as $question)
                    <tr class="h-16 {{ $loop->even ? "bg-neutral-50" : "" }}">
                        <td class="px-6">{{ $question->question }}</td>
                        <td class="px-6 text-end">
                            <a href="/dashboard/edit/faq/{{ $question->id }}"
                               class="text-blue-500 transition-all duration-300 hover:text-blue-700">Modifier</a>
                        </td>
                        <td class="px-6 text-end">
                            <form method="post" action="/about/faq/{{ $question->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500 transition-all duration-300 hover:text-red-700">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</x-dashboard-layout>
