<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use function PHPUnit\Framework\returnArgument;

class authController extends Controller
{
    public function loginIndex()
    {
        return view('pages.auth.Login.index');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard', absolute: false));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registerOption(Request $request)
    {
        return view('pages.auth.Register.option');
    }

    public function registerCustomer(Request $request)
    {
        return view('pages.auth.Register.customer');
    }

    public function registerCustomerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'customer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function registerPethouse(Request $request)
    {
        return view("pages.auth.Register.pethouse");
    }

    public function registerPethouseStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'pethouse',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('pethouse.dashboard');
    }

    public function oauthRedirect(Request $request)
    {
        $type = $request->type;
        if (!in_array($type, ['customer', 'pethouse', 'login'])) {
            return back();
        }
        config([
            'services.google.redirect' => route("oauth.callback", ["type" => $type])
        ]);

        return Socialite::driver("google")->redirect();
    }

    public function oauthCallback(Request $request)
    {
        $type = $request->type;

        if (!in_array($type, ['pethouse', 'customer', 'login'])) {
            return back();
        }
        config([
            'services.google.redirect' => route("oauth.callback", ["type" => $type])
        ]);
        $userData = Socialite::driver('google')->stateless()->user();
        $user = User::firstWhere('email', $userData->email);
        if ($type == 'login') {
            if (!$user) {
                return redirect()->route('login')->withErrors(['email' => 'email belum terdaftar']);
            }
        } else {
            if (!$user) {
                $user = User::create([
                    'email' => $userData->email,
                    'name' => $userData->name,
                    'password' => Hash::make(Hash::make(str()->random())),
                    'profile_picture' => $userData->avatar,
                    'role' => $type,
                ]);
            }
        }
        Auth::login($user);
        switch ($user->role) {
            case 'pethouse':
                $redirectRoute = route('pethouse.dashboard');
                break;
            case 'customer':
                $redirectRoute = route('dashboard');
                break;
            case 'meowinn':
                $redirectRoute = route('meowinn.dashboard');
                break;
        }
        return redirect()->intended($redirectRoute)->with('success', 'Login Berhasil!');
    }
}
