<x-app-layout>
    <x-slot:title>
        Accueil
    </x-slot:title>

    <main class="max-w-5xl mx-auto">
        <section class="flex justify-between">
            <div class="mt-48 flex group">
                <h1 class="text-7xl leading-tight tracking-wider my-3  font-bold">
                    Le talk-show<br>
                    <span class="text-blue-violet group-hover:text-jacarta transition-all duration-300">queer</span> et
                    <span
                        class="text-blue-violet group-hover:text-jacarta transition-all duration-300">militant</span><br>
                    de Twitch !
                </h1>
            </div>
        </section>
        <section class="text-3xl mt-80  font-bold w-175 ml-auto">
            <p class="mb-10">Émission mensuelle diffusée en direct sur Twitch, La Woke hystérie est née d’une envie de
                faire bouger les choses. Nombre de streameur·euses se sont lancé·es dans l’aventure et ont créé leurs
                émissions ces dernières années, sur tous les sujets possibles. Mais nous avons fait deux constats.
                Aujourd’hui, sur Twitch, il y a une demande croissante pour un contenu queer et féministe, mais la scène
                du talk-show est majoritairement occupée par des hommes cisgenres.</p>
            <p class="mb-10">Chaque mois, nous recevrons un·e invité·e pour parler avec nous d’un thème donné. Ces deux
                heures de discussion(s) seront l’occasion de réfléchir toustes ensemble pour comprendre le militantisme,
                la culture et l’histoire LGBT+ !</p>
            <p>Plus d'infos dans À propos...</p>
        </section>

        <section class="grid grid-cols-2 gap-10 text-3xl mt-80  font-bold">
            <article class="w-135">
                <h2 class="font-luckiest-guy text-5xl text-blue-violet">Infos</h2>
                <p class="mb-10">Prochain épisode le vendredi 21 juillet, à 20h, sur la chaîne de Desentredeux.</p>
                <p>Suivez toute l'actualité de l'émission sur Twitter, les extraits et coulisses sur
                    Instagram et les replays intégraux sur YouTube !</p>
            </article>
            <article class="w-135">
                <a href="/blog/posts/"><h2
                        class="font-luckiest-guy text-5xl text-blue-violet transition-all duration-300 hover:text-jacarta">
                        Blog</h2></a>
                <p>La Woke Hystérie version lecture. Réflexions, actus et articles concoctés par la team
                    Woke...</p>
            </article>
        </section>

        <section class="text-3xl mt-80 w-175  font-bold text-center mx-auto">
            <h2 class="font-luckiest-guy text-5xl text-blue-violet">
                <a href="{{ $episode?->link }}" target="_blank">Épisode #{{ $episode?->number }}</a>
            </h2>
            <p>"{{ $episode?->title }}", avec {{ $episode?->guest }}, disponible sur
                toutes les plateformes de podcast !</p>
        </section>
    </main>
</x-app-layout>
