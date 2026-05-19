<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // ចាប់យកពាក្យគន្លឹះពីប្រអប់ Input ឈ្មោះ 'search'
        $search = $request->input('search');

        // បង្កើត Query មូលដ្ឋានសម្រាប់ទាញតែគណនី 'user'
        $query = User::where('role', 'user');

        // ប្រសិនបើមានការវាយស្វែងរក
        if (!empty($search)) {
            $query->where('email', 'LIKE', '%' . $search . '%');
        }

        // បង្ហាញទិន្នន័យម្តង ១០ នាក់
        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
    }




    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }
}
