<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => ['required'],
            'team' => ['required', 'string'],
        ]);

        $user = User::findOrFail($request->user_id);
        $user->team = $request->get('team');
        $user->save();

        return back()->with('success', 'Membre ajouté !');
    }
}
