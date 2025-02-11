<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Form Register'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:5',
            'username' => 'required|unique:users|max:255|min:5',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:5|max:255',
            // 'password' => ['required', Password::min(5)->letters()->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/login')->with('status', 'User has been created please login!');
    }
}
