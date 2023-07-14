<x-dashboard-layout>
    <x-slot name="title">
        Profil
    </x-slot>

    <x-title>Profil
        @if(isset($user->profile_picture) ? Storage::exists($user->profile_picture) : false)
            <x-slot:image>
                <img src="{{ url(substr_replace($user->profile_picture, 'storage', 0, 6)) }}"
                     class="my-auto mb-2 ml-10 w-20 rounded-full"
                     alt="Photo de profil de {{ $user->username }}">
            </x-slot:image>
        @endif
    </x-title>

    <form action="/dashboard/profile" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <section class="mx-auto mt-16 max-w-5xl rounded-xl bg-white p-12 shadow-xl">

            <main class="mb-10 grid grid-cols-2 gap-x-16 gap-y-10">
                {{-- Display name --}}
                <div>
                    <x-forms.input-label for="display_name" :value="__('Nom d\'affichage')"/>
                    <x-forms.form-input id="display_name" name="display_name" type="text" class="mt-1 block w-full"
                                        :value="old('display_name', $user->display_name)" required autofocus
                                        autocomplete="display_name"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('display_name')"/>
                </div>

                {{-- Username --}}
                <div class="">
                    <x-forms.input-label for="username" :value="__('Nom d\'utilisateur')"/>
                    <x-forms.form-input id="username" name="username" type="text" class="mt-1 block w-full"
                                        :value="old('username', $user->username)" required autofocus
                                        autocomplete="username"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('username')"/>
                </div>

                {{-- Email --}}
                <div class="">
                    <x-forms.input-label for="email" :value="__('Email')"/>
                    <x-forms.form-input id="email" name="email" type="email" class="mt-1 block w-full"
                                        :value="old('email', $user->email)" required autofocus autocomplete="email"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('email')"/>
                </div>

                {{-- Profile picture --}}
                <div class="">
                    <x-forms.input-label for="profile_picture" :value="__('Photo de profil')"/>
                    <x-forms.form-file-input id="profile_picture" name="profile_picture" type="file" accept="image/*"
                                             class="mt-1 block w-full file:mr-4 file:py-2 file:px-4 focus:outline-none
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-200 file:cursor-pointer shadow-none text-xs file:text-blue-violet"
                                             :value="old('profile_picture', $user->profile_picture)" autofocus/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('profile_picture')"/>
                </div>
            </main>
            <x-forms.primary-button class="ml-auto">Enregistrer</x-forms.primary-button>
        </section>

        <section class="mx-auto mt-16 max-w-5xl rounded-xl bg-white p-12 shadow-xl">
            <main class="mb-10 grid grid-cols-2 gap-x-16 gap-y-10">
                {{-- Bio --}}
                <div class="col-span-2">
                    <x-forms.input-label for="biography" class="mb-2" :value="__('Biography')"/>
                    <x-forms.form-textarea id="biography" name="biography"
                                           autofocus>{!!old('biography', $user->biography)!!}</x-forms.form-textarea>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('biography')"/>
                </div>

                {{-- Social --}}
                <div>
                    <x-forms.input-label for="social" :value="__('Lien')"/>
                    <x-forms.form-input id="social" name="social" type="url" class="mt-1 block w-full"
                                        :value="old('social', $user->social)" placeholder="https://example.com/"
                                        autofocus/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('social')"/>
                </div>
            </main>
            <x-forms.primary-button class="ml-auto">Enregistrer</x-forms.primary-button>
        </section>
    </form>

    <section class="mx-auto mt-16 max-w-5xl rounded-xl bg-white p-12 shadow-xl">
        <form action="/dashboard/profile/password" method="post">
            @csrf
            @method('PATCH')
            <main class="mb-10 grid grid-cols-2 gap-x-16 gap-y-10">
                {{-- Current password --}}
                <div class="">
                    <x-forms.input-label for="current_password" :value="__('Ancien mot de passe')"/>
                    <x-forms.form-input id="current_password" name="current_password" type="current_password" class="mt-1 block w-full"
                                        required autocomplete="current_password"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('current_password')"/>
                </div>

                {{-- Spacing --}}
                <div></div>

                {{-- New password --}}
                <div class="">
                    <x-forms.input-label for="new_password" :value="__('Nouveau mot de passe')"/>
                    <x-forms.form-input id="new_password" name="new_password" type="password" class="mt-1 block w-full"
                                        required autocomplete="new_password"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('new_password')"/>
                </div>

                {{-- Confirmation --}}
                <div class="">
                    <x-forms.input-label for="new_password_confirmation" :value="__('Confirmation')"/>
                    <x-forms.form-input id="new_password_confirmation" name="new_password_confirmation" type="password"
                                        class="mt-1 block w-full"
                                        required autocomplete="new_password"/>
                    <x-forms.input-error class="mt-2" :messages="$errors->get('new_password_confirmation')"/>
                </div>

            </main>
            <x-forms.primary-button>Enregistrer</x-forms.primary-button>
        </form>
    </section>
</x-dashboard-layout>
