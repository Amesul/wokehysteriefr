<x-dashboard-layout>
    <x-slot name="title">Edition</x-slot>
    <x-title>Edition</x-title>

    <main class="max-w-5xl mx-auto">
        <section class="mx-auto mt-16 max-w-5xl rounded-xl bg-white p-12 shadow-x">
            <h2 class="font-bold text-end text-3xl">Épisode actuel</h2>
            <form action="/dashboard/edit" method="post">
                {{-- Number --}}
                <fieldset class="grid grid-cols-6 gap-4 mb-5">
                    <div>
                        <x-forms.input-label for="number" required="true">Numéro</x-forms.input-label>
                        <x-forms.form-input class="mt-2" type="number" id="number" name="number">{{ $episode->number }}</x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('number')"/>
                    </div>

                    {{-- Title --}}
                    <div class="col-span-5">
                        <x-forms.input-label for="title" required="true">Titre</x-forms.input-label>
                        <x-forms.form-input class="mt-2" id="title" name="title">{{ $episode->title }}</x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('title')"/>
                    </div>

                    {{-- Guest --}}
                    <div class="col-span-6">
                        <x-forms.input-label for="guest" required="true">Invité·e</x-forms.input-label>
                        <x-forms.form-input class="mt-2" id="guest" name="guest">{{ $episode->guest }}</x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('guest')"/>
                    </div>

                    {{-- Link --}}
                    <div class="col-span-6">
                        <x-forms.input-label for="link" required="true">Lien</x-forms.input-label>
                        <x-forms.form-input class="mt-2" type="url" id="link" name="link">{{ $episode->link }}</x-forms.form-input>
                        <x-forms.input-error :messages="$errors->get('link')"/>
                    </div>
                </fieldset>
                <x-forms.primary-button class="ml-auto">Enregistrer</x-forms.primary-button>
            </form>
        </section>
    </main>
</x-dashboard-layout>
