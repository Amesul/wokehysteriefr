<x-app-layout>
    <x-slot name="title">FAQ</x-slot>
    <x-title>FAQ</x-title>

    <main class="mx-auto mt-10 flex max-w-5xl gap-10 lg:flex-nowrap flex-wrap">
        <section class="flex flex-col gap-10 w-1/2 text-xl">
            @foreach($questions as $question)
                @if($loop->even)
                    <article class="answer">
                        <h3 class="text-xl font-bold mb-4">{{ $question->question }}</h3>
                        {!! $question->answer !!}
                    </article>
                @endif
            @endforeach
        </section>
        <section class="flex flex-col gap-10 w-1/2 text-xl">
            @foreach($questions as $question)
                @if($loop->odd)
                    <article class="answer">
                        <h3 class="text-xl font-bold mb-4">{{ $question->question }}</h3>
                        {!! $question->answer !!}
                    </article>
                @endif
            @endforeach
        </section>
    </main>
</x-app-layout>
