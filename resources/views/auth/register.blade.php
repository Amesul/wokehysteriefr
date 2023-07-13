<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.input-label for="display_name" :value="__('Name')" />
            <x-forms.form-input id="display_name" class="block mt-1 w-full" type="text" name="display_name" :value="old('display_name')" required autofocus autocomplete="name" />
            <x-forms.input-error :messages="$errors->get('display_name')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-forms.input-label for="username" :value="__('Username')" />
            <x-forms.form-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.form-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.form-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.form-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 transition-all duration-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-forms.primary-button class="ml-4">
                {{ __('Register') }}
            </x-forms.primary-button>
        </div>
    </form>
</x-guest-layout>
