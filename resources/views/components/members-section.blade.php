@php use Illuminate\Database\Eloquent\Collection; @endphp
@php use App\Models\User; @endphp
@props([
    /** @var Collection|User[] */
    'users',
    'team',
    'title',
])

<section {{ $attributes->class(['my-14 w-full border-t py-3 border-jacarta']) }}>
    <h2 class="text-center text-3xl sm:text-4xl font-luckiest-guy">{{$title}}</h2>
    @foreach($users as $member)
        @if($member->team === $team)
            <article class="mt-7 member">
                <h3 class="text-2xl sm:text-3xl font-bold">
                    <a href="{{ $member->social }}"
                       target="_blank"
                       class="hover:text-jacarta">
                        {{ $member->display_name }}
                    </a>
                </h3>
                {!! $member->biography !!}
            </article>
        @endif
    @endforeach
    @admin()
    <x-forms.add-member :users="$users" :team="$team"/>
    @endadmin
</section>
