<x-app-layout>
    <x-slot name="title">Membres</x-slot>
    <x-title>Membres</x-title>

    <main class="mx-auto max-w-5xl">
        <x-members-section :users="$users" team="creators" title="Créateurices"/>
        <x-members-section :users="$users" team="writers" title="Chroniqueur·euses et journalistes"/>
        <x-members-section :users="$users" team="crew" title="Équipe artistique et technique"/>
    </main>
</x-app-layout>
