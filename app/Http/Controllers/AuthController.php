<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            return $this->redirectByRole($user);
        }

        return back()->withErrors([
            'username' => 'Invalid credentials'
        ])->withInput();
    }

    public function redirectByRole($user)
    {
        switch ($user->role) {
            case 'BU':
                return redirect()->route('bu.dashboard');

            case 'TSC':
                return redirect()->route('tsc.dashboard');

            case 'OBN':
                return redirect()->route('obn.dashboard');

            case 'KLN-BD':
                return redirect()->route('klnbd.dashboard');

            case 'KLN-TM':
                return redirect()->route('klntm.dashboard');

            default:
                Auth::logout();
                abort(403, 'Unknown role.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
