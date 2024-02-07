<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('guest.login');
    }

    public function loginProcess(Request $request)
    {
        # validate
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        # check if user exists on database
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'username' => 'These credentials do not match our records.'
            ]);
        }

        # authenticate the user and redirect
        $request->session()->regenerate();
        return to_route('dashboard');
    }
}
