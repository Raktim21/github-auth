<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        // dd($githubUser);

        // If the user doesn't exist create, else update the existing one
        $user = User::updateOrCreate([
            'email' => $githubUser->getEmail(),
        ], [
            'provider_id' => $githubUser->getId(),
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'token' => $githubUser->token,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
    

    public function logout(Request $request)
    {
        Auth::logout(); // This logs the user out

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token to prevent session fixation attacks

        return redirect('/'); // Redirect to the login page
    }
}
