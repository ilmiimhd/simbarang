<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nip'      => 'required|string|max:50|unique:users,nip,' . $request->user()->id,
            'email'    => 'required|email|max:255|unique:users,email,' . $request->user()->id,
            'jabatan'  => 'nullable|string|max:100',
            'instansi' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = $request->user();
        $user->name     = $request->name;
        $user->nip      = $request->nip;
        $user->email    = $request->email;
        $user->jabatan  = $request->jabatan;
        $user->instansi = $request->instansi;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
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
