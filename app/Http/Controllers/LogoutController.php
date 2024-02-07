<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request, $user)
    {
        # Check user and update lastlogin user
        $user = User::findOrFail($user);
        $user->update([
            'lastlogin' => now()
        ]);

        # Logout and remove session
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        # Redirect to home
        return to_route('home');
    }
}
