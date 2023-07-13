<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
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
        if (!isset($request->tags)) {
            return back()->with('danger', 'Le post doit être associé à un tag au minimum');
        }

        $tags = Tag::find($request->tags);

        Post::create(array_merge($request->validate([
                'title' => ['required', 'string'],
                'excerpt' => ['required', 'string', 'max:250'],
                'body' => 'required',
            ]), [
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
