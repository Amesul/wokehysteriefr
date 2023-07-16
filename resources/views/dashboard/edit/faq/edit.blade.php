<x-dashboard-layout>
    <x-slot name="title">
        Modifier
    </x-slot>

    <x-title>Modifier</x-title>

    <section class="mx-auto mt-8 rounded-xl bg-white px-6 py-10 shadow-xl sm:mt-12 lg:mt-16 md:p-12">
        <form action="/about/faq/{{ $question->id }}" method="post">
            @csrf
            @method('PATCH')
            <main class="mb-10 grid gap-10">
                {{-- Question --}}
                <div class="col-span-3">
                    <x-forms.input-label for="question" :value="__('Question')"/>
                    <x-forms.form-input id="question" name="question" type="text" class="mt-1 block w-full"
                                        :value="old('question', $question->question)" required/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('question')"/>
                </div>

                {{-- Answer --}}
                <div class="col-span-3 cursor-text">
                    <x-forms.input-label for="answer" class="mb-2" :value="__('Réponse')"/>
                    <x-forms.form-textarea id="answer" name="answer"
                                           autofocus>{{old('answer', $question->answer)}}</x-forms.form-textarea>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('answer')"/>
                </div>
            </main>
            <x-forms.primary-button class="ml-auto">Enregistrer</x-forms.primary-button>
        </form>
    </section>
</x-dashboard-layout>
