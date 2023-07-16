<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Providers\Purifier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'profile_picture' => ['nullable', 'file'],
            'display_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . auth()->user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
            'biography' => ['nullable', 'string', 'max:2500'],
            'social' => ['nullable', 'url'],
            'job' => ['nullable', 'string'],
        ]);

        if ($attributes['profile_picture'] ?? false) {
            $attributes['profile_picture'] = request()->file('profile_picture')->store('public/profile_pictures');
            if (isset($request->user()->profile_picture) ? Storage::exists($request->user()->profile_picture) : false) {
                Storage::delete($request->user()->profile_picture);
            }
        }

        if ($attributes['biography']) {
            $attributes['biography'] = Purifier::clean($request['biography']);
        }

        $request->user()->update($attributes);

        return redirect('/dashboard/profile')->with('success', 'Profil modifié');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
