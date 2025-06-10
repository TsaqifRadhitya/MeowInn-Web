<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class pethouseRegisterController extends Controller
{
    public function index()
    {
        return view("pages.auth.Register.pethouse");
    }

    public function store(Request $request)
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
}
