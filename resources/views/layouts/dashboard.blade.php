<!DOCTYPE html>
<html lang="fr">
<x-head.head :title="$title"/>
<body class="w-full text-xl text-neutral-900 antialiased bg-parchment font-gotham">


@if (Session::has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         class="fixed bottom-10 left-6 rounded-md bg-green-300 px-4 py-2 shadow-xl">
        <p class="mx-auto">{!! Session::get('success') !!}</p>
    </div>
@endif

@if (Session::has('danger'))
    <div class="fixed bottom-10 left-6 rounded-md bg-red-300 px-4 py-2 shadow-xl">
        <p class="mx-auto">{!! Session::get('danger') !!}</p>
    </div>
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
