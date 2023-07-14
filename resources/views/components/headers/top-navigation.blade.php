@props(['dashboard' => false])
<section
    class="fixed top-0 z-50 flex h-12 w-full font-bold bg-maize">
    @if(!$dashboard)
        @auth()
            <a class="my-auto ml-10 text-xl text-jacarta" href="/dashboard/profile">
                <h5> Bienvenue, {{ auth()->user()->display_name }} !</h5>
            </a>
        @endauth

            <div class="mr-10 ml-auto grid grid-cols-4 place-content-center">
                <x-headers.social-icon class="fa-twitter" link="https://twitter.com/wokehysterie"/>
                <x-headers.social-icon class="fa-instagram" link="https://instagram.com/wokehysterie"/>
                <x-headers.social-icon class="fa-youtube" link="https://youtube.com/@wokehysterie"/>
                <x-headers.social-icon class="fa-twitch" link="https://twitch.com/desentredeux"/>
            </div>
    @endif

    @if($dashboard)
        <nav class="mx-auto my-auto inline-flex ml-0 h-full">
            <x-headers.dashboard-link href="/"
                                      :active="request()->path() === '/'" class="font-normal">
                Retour au site
            </x-headers.dashboard-link>
            <x-headers.dashboard-link href="/dashboard/profile"
                                      :active="request()->path() === 'dashboard/profile'">
                Profil
            </x-headers.dashboard-link>
            <x-headers.dashboard-link href="/dashboard/posts"
                                      :enable="auth()->user()?->writer"
                                      :active="request()->path() === 'dashboard/posts'">
                Posts
            </x-headers.dashboard-link>
            <x-headers.dashboard-link href="/dashboard/edit"
                                      :enable="auth()->user()?->admin"
                                      :active="request()->path() === 'dashboard/edit'">
                Édition
            </x-headers.dashboard-link>
            <x-headers.dashboard-link href="/dashboard/users"
                                      :enable="auth()->user()?->admin"
                                      :active="request()->path() === 'dashboard/users'">
                Utilisateur·ices
            </x-headers.dashboard-link>
        </nav>
    @endif



    @auth()
        <form method="post" action="/logout" class="my-auto">
            @csrf
            <button class="block h-full transition-all duration-300 px-6 w-fit text-xl py-2.5 hover:text-white hover:bg-red-600">
                Déconnexion
            </button>
        </form>
    @endauth
</section>
