@props(['home' => false,])
<nav {{ $attributes->class(['ml-auto text-2xl text-blue-violet']) }}>
    <ul class="flex">
        @if(!$home)
            <li class="font-luckiest-guy after:content-['|'] after:mx-10">
                <a class="transition-all duration-300 hover:text-jacarta"
                   href="/">Accueil</a>
            </li>
        @endif
        <li class="font-luckiest-guy after:content-['|'] after:mx-10">
            <a class="transition-all duration-300 hover:text-jacarta"
               href="/blog/posts">Blog</a>
        </li>
        <li class="font-luckiest-guy after:content-['|'] after:mx-10">
            <a class="transition-all duration-300 hover:text-jacarta"
               href="/about/members">À propos</a>
        </li>
        <li class="font-luckiest-guy">
            <a class="transition-all duration-300 hover:text-jacarta"
               href="/contact">Contact</a>
        </li>
    </ul>
</nav>
