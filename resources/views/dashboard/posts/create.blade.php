<x-dashboard-layout>
    <x-slot name="title">
        Écrire
    </x-slot>

    <x-title>Écrire</x-title>

    <section class="mx-auto mt-8 rounded-xl bg-white px-6 py-10 shadow-xl sm:mt-12 lg:mt-16 md:p-12">
        <form action="/blog/posts" method="post">
            @csrf
            <main class="mb-10 grid grid-cols-3 gap-10">
                {{-- Title --}}
                <div class="col-span-3">
                    <x-forms.input-label for="title" :value="__('Titre')"/>
                    <x-forms.form-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title')" required/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('title')"/>
                </div>

                {{-- Tags --}}
                <div x-data="{ open: false }">
                    <div @click="open = !open"
                         class="mt-2 flex h-10 w-40 rounded-md border border-gray-300 font-bold shadow-sm focus:border-blue-violet focus:ring-blue-violet">
                        <p class="my-auto ml-2 block">Tags</p>
                        <i class="my-auto mr-2 ml-auto block fa-solid fa-chevron-down"></i>
                    </div>
                    <ul x-show="open" @click.outside="open = false"
                        class="absolute z-40 mt-2 w-fit overflow-x-hidden overflow-y-scroll rounded-md bg-slate-200 py-4 pr-8 pl-4 shadow-lg focus:ring-blue-violet">
                        @foreach($tags as $tag)
                            <li class="block flex items-baseline">
                                <input type="checkbox" name="tags[{{ $tag->id }}]" value="{{ $tag->id }}"
                                       class="mr-2 rounded">{{ucwords($tag->name)}}
                            </li>
                        @endforeach
                    </ul>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('tags')"/>
                </div>

                {{-- Excerpt --}}
                <div class="col-span-3 cursor-text">
                    <x-forms.input-label for="excerpt" class="mb-2" :value="__('Résumé')"/>
                    <x-forms.form-textarea id="excerpt" name="excerpt"
                                           autofocus>{{old('excerpt')}}</x-forms.form-textarea>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('excerpt')"/>
                </div>

                {{-- Body --}}
                <div class="col-span-3 cursor-text">
                    <x-forms.input-label for="body" class="mb-2" :value="__('Post')"/>
                    <x-forms.form-textarea id="body" name="body"
                                           autofocus>{!!old('body' )!!}</x-forms.form-textarea>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('body')"/>
                </div>
            </main>
            <x-forms.primary-button class="ml-auto">Créer</x-forms.primary-button>
        </form>
    </section>
</x-dashboard-layout>
