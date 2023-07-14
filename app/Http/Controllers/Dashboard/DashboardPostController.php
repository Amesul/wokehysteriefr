<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Providers\Purifier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string', 'max:250'],
            'body' => 'required',
            'tags' => 'required'
        ]);

        $tags = Tag::find($request->tags);
        $attributes['excerpt'] = Purifier::cleanFull($request['excerpt']);
        $attributes['body'] = Purifier::clean($request['body']);

        Post::create(array_merge($attributes, [
                'user_id' => request()->user()->id,
                'slug' => Str::slug(request()->title, '-'),
                'thumbnail' => request()->file('thumbnail')?->store('thumbnails')
            ])
        )->tags()->attach($tags);

        return redirect('/dashboard/posts')->with('success', 'Post créé');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
        ]);
    }

    public function update()
    {
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('danger', 'Post supprimé');
    }
}
