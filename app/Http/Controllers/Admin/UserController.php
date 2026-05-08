<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'role'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);

        return redirect()->route('admin.users');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>"required|email|unique:users,email,{$user->id}",
            'role'=>'required'
        ]);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role
        ]);

        return redirect()->route('admin.users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }
}