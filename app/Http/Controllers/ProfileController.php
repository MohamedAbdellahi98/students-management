<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function showPasswordUpdateForm(): View
    {
        return view('standard_users.update-password');
    }

    public function updatePassword(Request $request)
    {
         // Validates the request, checks if current_password and new_password fields are provided
        // and new_password is confirmed and has a minimum length of 8
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        
        // Checks if the provided current password matches the stored password of the user
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('standard.update-password')->with('status', 'Password updated successfully.');
    }
}
