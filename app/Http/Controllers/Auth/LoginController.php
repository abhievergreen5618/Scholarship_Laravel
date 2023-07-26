<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed.');
        }

        // Check if the user exists in your database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
        } else {
            // If the user doesn't exist, create a new user in the database and log them in
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                // Add other necessary fields as per your user model
            ]);

            Auth::login($newUser);
        }

        return redirect('/'); // Redirect to your desired route after successful login
    }
}