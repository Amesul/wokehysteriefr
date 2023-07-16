@props(['image' => null, 'filter' => null])
@if(request()->path() !== '/')
    <div class="mx-auto mt-4 flex items-center">
        <h1 class="block text-3xl font-bold sm:text-5xl md:text-6xl text-blue-violet">{{ $slot }} {{ $filter }}</h1>
        {{ $image }}
    </div>
@endif
