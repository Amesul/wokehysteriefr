@if(request()->route()->uri !== '/')
    <div class="mt-12 flex md:px-10 px-2 py-4 bg-parchment text-blue-violet">
        <div>
            <x-headers.application-title/>
            <p class="-mt-2 text-sm hidden md:block">Le talk-show queer et militant de Twitch !</p>
        </div>

        <x-headers.nav/>
    </div>

    <div class="h-28 bg-parchment"
         style="transform:rotate(180deg); background: linear-gradient(to bottom,#ffffff00 15%,#F0E9D3 90%), url('/images/banner.png') no-repeat;background-size:cover; background-position-x:center; background-color: #F0E9D3">
    </div>
@else
    <div class="mt-12 flex md:px-10 px-2 py-4 bg-parchment text-blue-violet">
        <div>
            <x-headers.application-title/>
        </div>

        <x-headers.nav :home="true"/>
    </div>
@endif
