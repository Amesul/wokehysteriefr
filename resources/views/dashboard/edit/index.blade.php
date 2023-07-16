<x-dashboard-layout>
    <x-slot name="title">Edition</x-slot>
    <x-title>Edition</x-title>

    <main class="mx-auto">
        <h2 class="mt-8 text-end text-3xl font-bold sm:mt-12 lg:mt-16">Dernier épisode</h2>
        <section class="mx-auto mt-8 rounded-xl bg-white px-6 py-10 shadow-xl md:p-12">
            <form action="/dashboard/edit/episode" method="post">
                @csrf
                {{-- Number --}}
                <fieldset class="mb-5 grid grid-cols-6 gap-4">
                    <div class="col-span-6 md:col-span-1">
                        <x-forms.input-label for="number" required="true">Numéro</x-forms.input-label>
                        <x-forms.form-input class="mt-2" type="number" id="number"
                                            name="number"
                                            value="{{ old('number', $episode?->number) }}"></x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('number')"/>
                    </div>

                    {{-- Title --}}
                    <div class="col-span-6 md:col-span-5">
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

        <h2 class="mt-8 text-end text-3xl font-bold sm:mt-12 lg:mt-16">FAQ</h2>
        <x-create-element href="/dashboard/edit/faq/create" class="mt-8">Ajouter une question</x-create-element>
        <section class="mx-auto mt-8 rounded-xl bg-white w-full shadow-xl">
            <table class="hidden w-full table-auto overflow-hidden rounded-xl md:table">
                <tbody>
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

            @foreach($questions as $question)
                <table
                    class="w-full text-start table-auto overflow-hidden rounded-xl md:hidden {{ $loop->even ? "bg-neutral-50" : "" }}">
                    <thead>
                    <tr>
                        <th colspan="2" class="w-full px-4 pt-3 text-start">{{ $question->question }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="px-4 pb-3">
                            <a href="/dashboard/edit/faq/{{ $question->id }}"
                               class="text-blue-500 transition-all duration-300 hover:text-blue-700">Modifier</a>
                        </td>
                        <td class="px-4 pb-3">
                            <form method="post" action="/about/faq/{{ $question->id }}">
                                @method('DELETE')
                                @csrf
                                <button class="text-red-500 transition-all duration-300 hover:text-red-700">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endforeach
        </section>
    </main>
</x-dashboard-layout>
