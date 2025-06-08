<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileAdminController extends Controller
{
    public function index()
    {
        $user = User::with("village.district.city.province")->find(Auth::user()->id);
        return view('pages.meowinn.profile.index', compact('user'));
    }
    public function edit()
    {
        $user = User::with("village.district.city.province")->find(Auth::user()->id);
        return view('pages.meowinn.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {

    }
}
