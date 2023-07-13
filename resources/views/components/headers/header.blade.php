@if(request()->route()->uri !== '/')
    <div class="mt-12 flex bg-parchment text-blue-violet px-10 py-4">
        <div>
            <x-headers.application-title/>
            <p class="text-sm -mt-2">Le talk-show queer et militant de Twitch !</p>
        </div>

        <x-headers.nav/>
    </div>

    <div class="bg-parchment h-28"
         style="transform:rotate(180deg); background: linear-gradient(to bottom,#ffffff00 15%,#F0E9D3 90%), url('/images/banner.png') no-repeat;background-size:cover; background-position-x:center; background-color: #F0E9D3">
    </div>
@else
    <div class="mt-12 flex bg-parchment text-blue-violet px-10 py-4">
        <x-headers.application-title/>
        <x-headers.nav :home="true"/>
        <div>
@endif
