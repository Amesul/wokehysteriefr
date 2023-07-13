<button
    {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'block items-center px-4 py-2 bg-blue-violet border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest transition-all duration-300 hover:bg-bright-lavender focus:bg-bright-lavender active:bg-bright-lavender focus:outline-none focus:ring-2 focus:ring-bright-lavender focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
