<!DOCTYPE html>
<html lang="fr">
<x-head.head :title="$title"/>
<body class="w-full text-xl text-neutral-900 antialiased bg-parchment font-gotham">

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

<main class="mt-24 min-h-96">
    {{ $slot }}
</main>

<x-footer.footer/>

</body>
</html>
