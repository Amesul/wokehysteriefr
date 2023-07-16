<footer {{ $attributes }} class="mt-24 py-24 text-white bg-jacarta text-base md:text-xl lg:text-2xl">
    <main class="grid lg:grid-cols-2 xl:gap-64 gap-y-14 xl:max-w-7xl max-w-4xl mx-auto w-fit">
        <aside>
            <h1 class="text-3xl sm:text-5xl text-white font-luckiest-guy">La Woke Hystérie</h1>
            <p class="text-lg md:">© 2022 - 2023 <br>
                Tous droits réservés</p>
        </aside>
        <section class="flex flex-col sm:flex-row sm:gap-4 gap-10">
            <x-footer.site-map-container title="Découvrir">
                <x-footer.site-map-link href="/">
                    Accueil
                </x-footer.site-map-link>
                <x-footer.site-map-link href="/blog/posts">
                    Blog
                </x-footer.site-map-link>
                <x-footer.site-map-link href="/about/members">
                    Membres
                </x-footer.site-map-link>
                <x-footer.site-map-link href="/about/faq">
                    FAQ
                </x-footer.site-map-link>
                <x-footer.site-map-link href="/contact">
                    Contact
                </x-footer.site-map-link>
            </x-footer.site-map-container>
            <x-footer.site-map-container title="Extras">
                <x-footer.site-map-link href="/dashboard/profile">
                    Dashboard
                </x-footer.site-map-link>
                <x-footer.site-map-link href="#" target="_blank">
                    Podcast <i class="text-sm ml-0.5 fa-solid fa-up-right-from-square"></i></x-footer.site-map-link>
                <x-footer.site-map-link href="https://www.youtube.com/playlist?list=PLlgMdF5GdeHtOeO3dfLc8oaXf0j16pebb"
                                        target="_blank">
                    Replays <i class="text-sm ml-0.5 fa-solid fa-up-right-from-square"></i></x-footer.site-map-link>
                <x-footer.site-map-link href="/about/legal">
                    Mentions légales
                </x-footer.site-map-link>
            </x-footer.site-map-container>
        </section>
    </main>
</footer>
