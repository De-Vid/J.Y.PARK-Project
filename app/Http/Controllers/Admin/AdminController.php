<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Search
        $search = $request->input('search');

        // Query
        $query = User::where('role', 'admin');

        // Search by email
        if (!empty($search)) {
            $query->where('email', 'LIKE', '%' . $search . '%');
        }

        // Pagination
        $admins = $query->paginate(10);

        return view('admin.index', compact('admins'));
    }

        public function create()
    {
        return view('admin.create');
    }

    // Store Admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Admin created successfully');
    }

        public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.index')->with('success', 'Updated successfully');
    }

    // DELETE
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Deleted successfully');
    }
}