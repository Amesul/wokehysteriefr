@php use Illuminate\Database\Eloquent\Collection; @endphp
@php use App\Models\User; @endphp
@props([
    /** @var Collection|User[] */
    'users',
    'team',
])

<article
    x-data="{open: false}"
    @click="open = true"
    class="mx-auto mt-7 flex max-w-5xl cursor-pointer place-content-center items-center justify-center rounded-xl bg-white px-6 py-4 text-lg shadow-md outline-dashed outline-2 transition-all duration-300 outline-blue-violet group hover:bg-blue-violet hover:shadow-2xl hover:outline-offset-4 hover:outline-black">
    <p class="text-center text-xl font-bold transition-all duration-300 group-hover:text-white">Ajouter un membre</p>
    <i class="ml-2 text-2xl transition-all duration-300 fa-solid fa-circle-plus group-hover:text-white -mt-0.5"></i>
    <div x-show="open"
         class="fixed top-0 right-0 z-40 h-full w-full bg-neutral-800/[.8]" x-transition.opacity>
        <form @click.outside="open = false" method="post" action="/users"
              class="fixed top-1/2 left-1/2 z-50 max-w-xl origin-center -translate-x-1/2 -translate-y-1/2 rounded-lg bg-white px-8 py-6">
            @csrf
            @method('PATCH')
            <input id="team" name="team" type="hidden" value="{{ $team }}">

            <x-forms.input-label for="user_id">Utilisateurs</x-forms.input-label>
            <select id="user_id" name="user_id" class="rounded-md">
                @foreach($users as $user)
                    <option value="{{$user->id}}"> {{$user->display_name}}</option>
                @endforeach
            </select>

            <x-forms.primary-button class="mt-6 ml-auto">Ajouter</x-forms.primary-button>
        </form>
    </div>
</article>
