<!DOCTYPE html>
<html lang="fr">
<x-head.head :title="$title"/>
<body class="w-full text-base text-neutral-900 antialiased sm:text-xl bg-parchment font-gotham">

@if (Session::has('info'))
    <x-notification type="info">{{ Session::get('info') }}</x-notification>
@elseif(Session::has('danger'))
    <x-notification type="danger">{{ Session::get('danger') }}</x-notification>
@elseif(Session::has('success'))
    <x-notification type="success">{{ Session::get('success') }}</x-notification>
@endif

<header>
    <x-headers.top-navigation :dashboard="true"/>
</header>

<main class="mx-auto mt-24 min-h-175 max-w-xxs xs:max-w-xs sm:max-w-xl md:max-w-3xl lg:max-w-4xl xl:max-w-5xl">
    {{ $slot }}
</main>

<x-footer.footer/>

</body>
</html>
