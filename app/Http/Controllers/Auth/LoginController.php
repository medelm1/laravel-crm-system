<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt($validatedData)) {
                $request->session()->regenerate();
                return redirect()->route('contacts.index');
            }

            return back()->withErrors([
                'email' => 'Invalid credentials'
            ])->withInput();
        }

        return view('auth.login');
    }
}
