<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalRegularUsers'));
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}