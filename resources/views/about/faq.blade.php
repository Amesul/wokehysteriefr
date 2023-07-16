<x-app-layout>
    <x-slot name="title">FAQ</x-slot>
    <x-title>FAQ</x-title>

    <main class="mx-auto mt-10 flex flex-wrap gap-10 lg:flex-nowrap">
        <section class="flex w-1/2 flex-col gap-10">
            @foreach($questions as $question)
                @if($loop->even)
                    <article class="answer">
                        <h3 class="mb-4 font-bold">{{ $question->question }}</h3>
                        {!! $question->answer !!}
                    </article>
                @endif
            @endforeach
        </section>
        <section class="flex w-1/2 flex-col gap-10">
            @foreach($questions as $question)
                @if($loop->odd)
                    <article class="answer">
                        <h3 class="mb-4 font-bold">{{ $question->question }}</h3>
                        {!! $question->answer !!}
                    </article>
                @endif
            @endforeach
        </section>
    </main>
</x-app-layout>
