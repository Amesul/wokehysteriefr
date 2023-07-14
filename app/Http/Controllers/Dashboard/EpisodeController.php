<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Episode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class EpisodeController
{
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'number' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'guest' => ['required', 'string'],
            'link' => ['required', 'string'],
        ]);
        Episode::updateOrCreate(['number' => $attributes['number']], $attributes);

        return back()->with('success', 'Episode modifié');
    }
}
