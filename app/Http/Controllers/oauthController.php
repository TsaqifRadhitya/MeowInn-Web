<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Dotenv\Exception\ValidationException;

class oauthController extends Controller
{

    public function registerCustomer(Request $request)
    {
        return Socialite::driver("google_customer")->redirect();
    }
    public function registerCustomerCallback(Request $request)
    {
        $userData = Socialite::driver('google_customer')->stateless()->user();
        $user = User::whereEmail($userData->email)->first();

        if (!$user) {
            return $this->accountRegistered($user);
        }
        ;

        $user = User::create([
            'email' => $userData->email,
            'name' => $userData->name,
            'password' => Hash::make(Hash::make(str()->random())),
            'profile_picture' => $userData->avatar,
            'role' => 'customer',
        ]);

        Auth::login($user, true);

        return redirect()->route('dashboard')->with('success', 'Register Berhasil!');

    }

    public function registerPethouse(Request $request)
    {
        return Socialite::driver('google_pethouse')->redirect();
    }
    public function registerPethouseCallback(Request $request)
    {
        $userData = Socialite::driver('google_customer')->stateless()->user();

        $user = User::whereEmail($userData->email)->first();

        if (!$user) {
            return $this->accountRegistered($user);
        }
        ;

        $user = User::create([
            'email' => $userData->email,
            'name' => $userData->name,
            'password' => Hash::make(Hash::make(str()->random())),
            'profile_picture' => $userData->avatar,
            'role' => 'customer',
        ]);

        Auth::login($user, true);

        return redirect()->route('pethouse.dashboard')->with('success', 'Register Berhasil!');
    }

    private function accountRegistered(User $user)
    {
        Auth::login($user, true);

        if ($user->role === 'customer') {
            return redirect()->sendHeadersroute('dashboard')->with('success', 'Login Berhasil!');
        } else if ($user->role === 'meowinn') {
            return redirect()->route('meowinn.dashboard')->with('success', 'Login Berhasil!');
        } else {
            return redirect()->route('pethouse.dashboard')>with('success', 'Login Berhasil!');
        }
    }

    public function LoginCallback(Request $request)
    {
        $userData = Socialite::driver('google')->stateless()->user();
        $user = User::whereEmail($userData->email)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'email/password salah',
            ]);
        }
        ;

        Auth::login($user, true);

        if ($user->role === 'customer') {
            return redirect()->intended(route('dashboard'))->with('success', 'Login Berhasil!');
        } else if ($user->role === 'meowinn') {
            return redirect()->intended(route('meowinn.dashboard'))->with('success', 'Login Berhasil!');
        } else {
            return redirect()->intended(route('pethouse.dashboard'))->with('success', 'Login Berhasil!');
        }
    }
}
