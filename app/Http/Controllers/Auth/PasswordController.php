<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $user = auth()->user();

        // The password don't match
        if (!Hash::check($request->get('password'), $user->password)) {
            return back()->with('danger', "Le mot de passe actuel est invalide");
        }

        // Current password and new password same
        if ($request->password === $request->new_password) {
            return redirect()->back()->with("danger", "Le nouveau mot de passe doit être different de l'ancien");
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Mot de passe modifié !");
    }
}
