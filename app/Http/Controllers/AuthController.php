<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }
    public function authenticate()
    {

        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );
        // dd($validated);


        if (auth()->attempt($validated)) {

            request()->session()->regenerate();
            // Alert::success('Success','Logged in successfully!' );
            return redirect()->route('index');
        }

        return redirect()->route('index')->withErrors([
            'email' => "No matching user found with the provided email and password"
        ]);
    }


    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Alert::success('Success','Logged out successfully!' );

        return redirect()->route('index');
    }
}
