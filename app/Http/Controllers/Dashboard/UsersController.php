<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController
{
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()->sortBy('username'),
        ]);
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'admin' => ['nullable', 'boolean'],
            'writer' => ['nullable', 'boolean'],
        ]);

        $user->update($attributes);

        return back()->with('success', 'Utilisateur modifié');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->user()->id) {
            return back()->with('danger', 'Impossible de supprimer cet utilisateur');
        }
        $user->delete();
        return back()->with('danger', 'Utilisateur supprimé');
    }
}
