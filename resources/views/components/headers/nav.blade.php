@props(['home' => false,])
<nav class="ml-auto text-2xl text-blue-violet hidden md:block">
    <ul class="flex">
        @if(!$home)
            <x-headers.nav-link href="/">
                Accueil
            </x-headers.nav-link>
        @endif
        <x-headers.nav-link href="/blog/posts">Blog
        </x-headers.nav-link>
        <x-headers.nav-link href="/about/members">À propos
        </x-headers.nav-link>
        <x-headers.nav-link :after="false" href="/contact">Contact
        </x-headers.nav-link>
    </ul>
</nav>

<div x-data="{open: false}" class="md:hidden ml-auto">
    <button @click="open=true" class="block -mt-1">
        <i class="fa-solid fa-bars text-2xl"></i>
    </button>
    <nav x-show="open"
         x-transition.opacity.duration.300ms
         class="text-4xl absolute bg-blue-violet text-white w-screen h-screen top-0 left-0 z-50">
        <button @click="open = false" class="mr-8 mt-8 block ml-auto">
            <i class="text-2xl fa-solid fa-xmark"></i>
        </button>

        <ul class="grid w-full my-16 gap-8 place-items-center">
            @if(!$home)
                <x-headers.mobile-nav-link href="/">
                    Accueil
                </x-headers.mobile-nav-link>
            @endif
            <x-headers.mobile-nav-link :active="request()->path() === 'blog/posts'" href="/blog/posts">
                Blog
            </x-headers.mobile-nav-link>
            <x-headers.mobile-nav-link :active="request()->path() === 'about/members'" href="/about/members">
                À propos
            </x-headers.mobile-nav-link>
            <x-headers.mobile-nav-link :active="request()->path() === 'contact'" :after="false" href="/contact">
                Contact
            </x-headers.mobile-nav-link>
        </ul>
    </nav>
</div>
