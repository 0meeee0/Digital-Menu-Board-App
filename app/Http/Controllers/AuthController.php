<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 1,
            'subscription_plan_id' => 1,
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Account created successfully. You can now log in.');
    }

    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}



    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {

            return redirect('/login')->with('error', 'Google authentication failed. Please try again.');
        }


        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {

            Auth::login($existingUser, true);
        } else {

            $newUser = new User([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password = Str::random(12),
                'role' => 1,
                'subscription_plan_id' => 1,
            ]);

            $newUser->save();

            Auth::login($newUser, true);
        }

        return redirect()->intended('/');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {

            return redirect()->intended('/');
        }

        return redirect()->route('login')->with('error', 'Invalid email or password');
    }


}
