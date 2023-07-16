<!DOCTYPE html>
<html lang="fr">
<x-head.head title="Connexion"/>
<body class="font-sans text-gray-900 antialiased grid items-center min-h-screen bg-gray-100">
<div class=" flex flex-col md:justify-center items-center pt-6 md:pt-0 ">
    <div>
        <a href="/">
            <x-headers.application-title/>
        </a>
    </div>

    <div class="w-full md:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden md:rounded-lg">
        {{ $slot }}
    </div>
</div>
</body>
</html>
