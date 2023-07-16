<a {{ $attributes->merge([
    'class' => 'mx-auto flex cursor-pointer place-content-center items-center justify-center rounded-xl bg-white px-6 py-4 text-lg shadow-md outline-dashed outline-2 transition-all duration-300 outline-blue-violet group hover:bg-blue-violet hover:shadow-2xl hover:outline-offset-4 hover:outline-black'
]) }}>
    <p class="text-center  font-bold transition-all duration-300 group-hover:text-white">
        {{ $slot }}
    </p>
    <i class="ml-2 text-2xl transition-all duration-300 fa-solid fa-circle-plus group-hover:text-white -mt-0.5"></i>
</a>
