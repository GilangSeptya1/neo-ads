<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Facades\ActivityLog;

class AccountController extends Controller
{
    /**
     * Update password
     */
    public function update(Request $request)
    {
        // Validate
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.current_password' => 'The current password is incorrect.',
        ]);

        // Update password
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Optional: Log out other sessions
        // Auth::logoutOtherDevices($request->current_password);
        ActivityLog::logUpdated('user', 'Changed account password', 'App\Models\User', $user->id, $user->toArray());
        return redirect()->back()->with('success', 'Password changed successfully!');
    }
    
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('photo')->store('profile', 'public');

        auth()->user()->update([
            'photo' => 'storage/' . $path
        ]);

        ActivityLog::logUpdated('user', 'Updated profile photo', 'App\Models\User', auth()->user()->id, auth()->user()->toArray());
        return back();
    }
}