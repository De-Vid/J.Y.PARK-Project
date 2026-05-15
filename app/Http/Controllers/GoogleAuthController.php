<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with([
            'prompt' => 'select_account'
        ])->redirect();
    }

    // Handle Google Callback
    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            // Check existing user
            $user = User::where('email', $googleUser->getEmail())
                        ->orWhere('google_id', $googleUser->getId())
                        ->first();

            if ($user) {

                // UPDATE EXISTING USER
$user->update([

    'google_id' => $googleUser->getId(),

    'avatar' => $googleUser->getAvatar(),

    'email_verified_at' => now(),

]);

                Auth::login($user);

            } else {

                // CREATE NEW USER
$newUser = User::create([

    'name' => $googleUser->getName(),

    'email' => $googleUser->getEmail(),

    'google_id' => $googleUser->getId(),

    'avatar' => $googleUser->getAvatar(),

    'email_verified_at' => now(),

    'password' => bcrypt(Str::random(16)),

]);

Auth::login($newUser);
            }

            return redirect()->route('dashboard');

        } catch (\Exception $e) {

            return redirect()->route('login')
                ->with('error', 'Google login failed: ' . $e->getMessage());
        }
    }
}