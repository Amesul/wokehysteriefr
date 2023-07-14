<x-dashboard-layout>
    <x-slot name="title">
        FAQ
    </x-slot>

    <x-title>FAQ</x-title>

    <section class="mx-auto mt-4 max-w-5xl rounded-xl bg-white p-8 shadow-xl">
        <form action="/about/faq" method="post">
            @csrf
            <main class="mb-10 grid gap-10">
                {{-- Question --}}
                <div class="col-span-3">
                    <x-forms.input-label for="question" :value="__('Question')"/>
                    <x-forms.form-input id="question" name="question" type="text" class="mt-1 block w-full"
                                        :value="old('question')" required/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('question')"/>
                </div>

                {{-- Answer --}}
                <div class="col-span-3 cursor-text">
                    <x-forms.input-label for="answer" class="mb-2" :value="__('Réponse')"/>
                    <x-forms.form-textarea id="answer" name="answer"
                                           autofocus>{{old('answer')}}</x-forms.form-textarea>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('answer')"/>
                </div>
            </main>
            <x-forms.primary-button class="ml-auto">Ajouter</x-forms.primary-button>
        </form>
    </section>
</x-dashboard-layout>
