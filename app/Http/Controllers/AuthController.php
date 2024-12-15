<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            auth()->login($user);
            return redirect('/')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
