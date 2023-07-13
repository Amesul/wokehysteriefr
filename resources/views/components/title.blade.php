@props(['image' => null, 'filter' => null])
@if(request()->path() !== '/')
    <div class="mx-auto mt-4 max-w-5xl flex items-center">
        <h1 class="block text-6xl font-bold text-blue-violet">{{ $slot }} {{ $filter }}</h1>
        {{ $image }}
    </div>
@endif
