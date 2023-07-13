<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Tag $tag, User $author)
    {
        if (Str::contains(request()->path(), 'tags')) {
            return view('blog.index', [
                'posts' => $tag->posts->sortBy('published_at'),
                'filter' => $tag->name
            ]);
        }

        if (Str::contains(request()->path(), 'author')) {
            return view('blog.index', [
                'posts' => $author->posts->sortBy('published_at'),
                'filter' => $author->username
            ]);
        }

        return view('blog.index', [
            'posts' => Post::all()->sortBy('published_at'),
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
