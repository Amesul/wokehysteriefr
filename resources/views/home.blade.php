<!DOCTYPE html>
<html lang="fr">
<x-head.head title="Accueil"/>
<body class="w-full text-3xl text-neutral-900 antialiased bg-parchment font-gotham">

@if (Session::has('info'))
    <x-notification type="info">{{ Session::get('info') }}</x-notification>
@elseif(Session::has('danger'))
    <x-notification type="danger">{{ Session::get('danger') }}</x-notification>
@elseif(Session::has('success'))
    <x-notification type="success">{{ Session::get('success') }}</x-notification>
@endif

<header>
    <x-headers.top-navigation/>
    <x-headers.header/>
</header>
<main
    class="mx-auto mt-24 text-lg min-h-175 max-w-xxs xs:max-w-xs sm:max-w-xl sm:text-xl md:text-2xl lg:text-3xl md:max-w-3xl lg:max-w-4xl xl:max-w-7xl">
    <section class="flex justify-between">
        <div class="mx-auto mt-14 flex lg:mt-24 xl:mt-48 group lg:mx-0">
            <h1 class="my-3 text-center text-4xl font-bold leading-tight tracking-wider sm:text-5xl md:text-6xl lg:text-7xl lg:text-start">
                Le talk-show<br>
                <span class="transition-all duration-300 text-blue-violet group-hover:text-jacarta">queer</span> et
                <span
                    class="transition-all duration-300 text-blue-violet group-hover:text-jacarta">militant</span><br>
                de Twitch !
            </h1>
        </div>
    </section>
    <section class="mt-20 ml-auto font-bold lg:mt-60 xl:mt-80 lg:w-175">
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

    <section class="mt-20 hidden justify-between font-bold lg:mt-60 xl:mt-80 xl:flex">
        <x-home.infos/>
        <x-home.blog-infos/>
    </section>

    <section class="mt-20 flex max-w-6xl flex-col gap-16 font-bold lg:mt-60 xl:mt-80 xl:hidden">
        <x-home.infos/>
        <x-home.blog-infos class="ml-auto"/>
    </section>

    <section class="mx-auto mt-20 text-center font-bold lg:mt-60 xl:mt-80 lg:w-175">
        <h2 class="text-3xl transition-all duration-300 md:text-4xl lg:text-5xl font-luckiest-guy text-blue-violet hover:text-jacarta">
            <a href="{{ $episode?->link }}" target="_blank">Épisode #{{ $episode?->number }}</a>
        </h2>
        <p>"{{ $episode?->title }}", avec {{ $episode?->guest }}, disponible sur
            toutes les plateformes de podcast !</p>
    </section>
</main>

<x-footer.footer/>

</body>
</html>
