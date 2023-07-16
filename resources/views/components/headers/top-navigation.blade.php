@props(['dashboard' => false])
<section
    class="fixed top-0 z-50 flex h-12 w-full font-bold bg-maize text-lg">
    @if(!$dashboard)
        @auth()
            <a class="my-auto ml-2 md:ml-10 text-base md:text-lg text-jacarta" href="/dashboard/profile">
                <h5> Bienvenue, {{ auth()->user()->display_name }} !</h5>
            </a>
            <div class="mr-10 ml-auto md:grid grid-cols-4 place-content-center hidden">
                <x-headers.social-icon class="fa-twitter" link="https://twitter.com/wokehysterie"/>
                <x-headers.social-icon class="fa-instagram" link="https://instagram.com/wokehysterie"/>
                <x-headers.social-icon class="fa-youtube" link="https://youtube.com/@wokehysterie"/>
                <x-headers.social-icon class="fa-twitch" link="https://twitch.com/desentredeux"/>
            </div>
        @endauth

        @guest()
            <div class="md:mr-10 mx-auto grid grid-cols-4 place-content-center">
                <x-headers.social-icon class="fa-twitter" link="https://twitter.com/wokehysterie"/>
                <x-headers.social-icon class="fa-instagram" link="https://instagram.com/wokehysterie"/>
                <x-headers.social-icon class="fa-youtube" link="https://youtube.com/@wokehysterie"/>
                <x-headers.social-icon class="fa-twitch" link="https://twitch.com/desentredeux"/>
            </div>
        @endguest
    @endif

    @if($dashboard)
        <nav class="mx-auto my-auto text-base md:text-lg md:inline-flex ml-0 h-full hidden">
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

        <div x-data="{open: false}" class="md:hidden my-auto ml-2">
            <button @click="open=true">
                <i class="fa-solid fa-bars text-2xl "></i>
            </button>
            <nav x-show="open"
                 x-transition.opacity.duration.300ms
                 class="text-4xl absolute bg-maize text-white w-screen h-screen top-0 left-0 z-50">
                <button @click="open = false" class="mr-8 mt-8 block ml-auto">
                    <i class="text-2xl fa-solid fa-xmark"></i>
                </button>

                <ul class="grid w-full my-16 gap-8 place-items-center">
                    <x-headers.mobile-dashboard-link href="/"
                                                     :active="request()->path() === '/'" class="font-normal">
                        Retour au site
                    </x-headers.mobile-dashboard-link>
                    <x-headers.mobile-dashboard-link href="/dashboard/profile"
                                                     :active="request()->path() === 'dashboard/profile'">
                        Profil
                    </x-headers.mobile-dashboard-link>
                    <x-headers.mobile-dashboard-link href="/dashboard/posts"
                                                     :enable="auth()->user()?->writer"
                                                     :active="request()->path() === 'dashboard/posts'">
                        Posts
                    </x-headers.mobile-dashboard-link>
                    <x-headers.mobile-dashboard-link href="/dashboard/edit"
                                                     :enable="auth()->user()?->admin"
                                                     :active="request()->path() === 'dashboard/edit'">
                        Édition
                    </x-headers.mobile-dashboard-link>
                    <x-headers.mobile-dashboard-link href="/dashboard/users"
                                                     :enable="auth()->user()?->admin"
                                                     :active="request()->path() === 'dashboard/users'">
                        Utilisateur·ices
                    </x-headers.mobile-dashboard-link>
                </ul>
            </nav>
        </div>
    @endif



    @auth()
        <form method="post" action="/logout" class="my-auto ml-auto md:ml-0 text-base md:text-lg">
            @csrf
            <button
                class="block h-full transition-all duration-300 px-2 md:px-10 w-fit py-2.5 hover:text-white hover:bg-red-600">
                Déconnexion
            </button>
        </form>
    @endauth
</section>
