<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    public function login(Request $request)
{
    $request->validate([
        'login' => 'required',
        'password' => 'required'
    ]);

    $login = $request->login;
    $password = $request->password;

    $user = User::where('email', $login)
                ->orWhere('phone_number', $login)
                ->first();

    if (!$user || !Hash::check($password, $user->password)) {
        return back()->withErrors([
            'login' => 'Invalid credentials'
        ]);
    }

    Auth::login($user);

    return redirect()->route('dashboard');
}
}